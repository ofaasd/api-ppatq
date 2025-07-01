<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helpers_wa;
use Illuminate\Http\Request;

use App\Models\Kesehatan;
use App\Models\RawatInap;
use App\Models\SakuMasuk;
use App\Models\pembayaran;
use App\Models\SakuKeluar;
use App\Models\SantriDetail;
use App\Models\TbPemeriksaan;
use App\Models\RefJenisPembayaran;
use App\Models\DetailSantriTahfidz;
use App\Models\detailPembayaran;
use App\Models\DetailSantri;
use App\Models\SendWA;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\File;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

use App\Http\Resources\WaliSantriResource;

use App\Http\Requests\LoginWaliSantriRequest;
use App\Models\Kelengkapan;
use App\Models\Perilaku;

use Illuminate\Support\Facades\Http;

class WaliSantriController extends Controller
{
    private function getNamaBulan($angkaBulan)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $bulan[(int)$angkaBulan] ?? 'Bulan tidak valid';
    }

    public function login(LoginWaliSantriRequest $request): JsonResponse
    {
        $reqData = $request->validated();
        $noInduk = $reqData['noInduk'];
        $kode = $reqData['kode'];

        $response = Http::asForm()->post(config('services.passport_siswa.login_endpoint'), [
            'grant_type'    => 'password',
            'client_id'     => config('services.passport_siswa.client_id'),
            'client_secret' => config('services.passport_siswa.client_secret'),
            'username'      => $noInduk,
            'password'      => $kode,
            'scope'         => '',
        ]);

        // if ($response->failed()) {
        //     throw new HttpResponseException(response([
        //         "errors" => [
        //             'Verifikasi' => [
        //                 $response->json() // SALAH! Ini bukan bentuk response yang valid
        //             ]
        //         ]
        //     ], 400));
        // }

        if ($response->failed()) {
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Login gagal. Harap pastikan email dan password benar.'
                    ]
                ]
            ], 400));
        }

        $tanggalLahir = Carbon::parse($reqData['tanggalLahir'])->format('Y-m-d');

        $siswa = SantriDetail::where([
            'santri_detail.no_induk'=>$noInduk, 
            'santri_detail.kelas'=>$kode,
            'santri_detail.tanggal_lahir'=>$tanggalLahir
        ])
        ->select([
            'santri_detail.id',
            'santri_detail.no_induk',
            'santri_detail.tanggal_lahir',
            'santri_detail.nama',
            'santri_detail.photo',
            'santri_detail.kelas',
            'santri_detail.tempat_lahir',
            'santri_detail.jenis_kelamin',
            'santri_detail.alamat',
            'santri_detail.kelurahan',
            'santri_detail.kecamatan',
            'kota_kab_tbl.nama_kota_kab',
            'santri_detail.nama_lengkap_ayah',
            'santri_detail.pendidikan_ayah',
            'santri_detail.pekerjaan_ayah',
            'santri_detail.nama_lengkap_ibu',
            'santri_detail.pendidikan_ibu',
            'santri_detail.pekerjaan_ibu',
            'santri_detail.no_hp',
            'santri_detail.no_va',
            'ref_tahfidz.name AS kelasTahfidz',
            'ref_kamar.name AS kamar',
            'murroby.nama AS namaMurroby',
            'murroby.photo AS fotoMurroby',
            'tahfidz.nama AS namaTahfidz',
            'tahfidz.photo AS fotoTahfidz',
            'tb_uang_saku.jumlah AS saldo',
        ])
        ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id_kota_kab', '=', 'santri_detail.kabkota')
        ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
        ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
        ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
        ->leftJoin('employee_new AS murroby', 'murroby.id', '=', 'ref_kamar.employee_id')
        ->leftJoin('employee_new AS tahfidz', 'tahfidz.id', '=', 'ref_tahfidz.employee_id');   

        if($siswa->count() > 0){
            $hasil = $siswa->first();

            $tokenData = $response->json();

            $sakuMasuk = SakuMasuk::select([
                DB::raw("
                    CASE tb_saku_masuk.dari
                        WHEN 1 THEN 'Uang Saku'
                        WHEN 2 THEN 'Kunjungan Walsan'
                        WHEN 3 THEN 'Sisa Bulan Kemarin'
                        ELSE 'Tidak Diketahui'
                    END AS uangAsal
                "),
                'tb_saku_masuk.jumlah',
                'tb_saku_masuk.tanggal'
            ])
            ->where('no_induk', $hasil->no_induk)->orderBy('tb_saku_masuk.tanggal', 'desc')->get();
            $sakuKeluar = SakuKeluar::select([
                'employee_new.nama',
                'tb_saku_keluar.jumlah',
                'tb_saku_keluar.note',
                'tb_saku_keluar.tanggal',
            ])
            ->leftJoin('employee_new', 'employee_new.id', '=', 'tb_saku_keluar.pegawai_id')
            ->where('no_induk', $hasil->no_induk)->orderBy('tb_saku_keluar.tanggal', 'desc')->get();
             
            if ($hasil) {
                $hasil->kelas = strtoupper($hasil->kelas);
                $hasil->tanggal_lahir = Carbon::parse($hasil->tanggal_lahir)->translatedFormat('d F Y');
                $hasil->access_token = $tokenData['access_token'];
                $hasil->expires_in = $tokenData['expires_in'];
            }
            $hasil->saku_masuk = $sakuMasuk;
            $hasil->saku_keluar = $sakuKeluar;

            activity()
            ->useLog('autentikasi')
            ->event('POST')
            ->causedBy($hasil)
            ->withProperties([
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'who' => 'wali-santri',
            ])
            ->log('Login');

            return (new WaliSantriResource($hasil))->response()->setStatusCode(200);
        }else{
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Login gagal. Harap pastikan data yang dimasukan sudah benar'
                    ]
                ]
            ], 400));
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $request->user()->token()->revoke();

        activity()
        ->useLog('autentikasi')
        ->event('POST')
        ->causedBy($user)
        ->withProperties([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'who' => 'wali-santri',
        ])
        ->log('Logout');

        return response()->json([
            'status'    => 200,
            'message' => 'Logout berhasil',
        ], 200);
    }

    public function kesehatan($noInduk)
    {
        try{
            $RiwayatSakit = Kesehatan::select([
                'tb_kesehatan.sakit AS keluhan',
                'tb_kesehatan.tanggal_sakit AS tanggalSakit',
                'tb_kesehatan.tanggal_sembuh AS tanggalSembuh',
                'tb_kesehatan.keterangan_sakit AS keteranganSakit',
                'tb_kesehatan.keterangan_sembuh AS keteranganSembuh',
                'tb_kesehatan.tindakan',
            ])
            ->where('santri_id',$noInduk)
            ->get();

            $Pemeriksaan = TbPemeriksaan::select([
                'tb_pemeriksaan.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tb_pemeriksaan.tinggi_badan AS tinggiBadan',
                'tb_pemeriksaan.berat_badan AS beratBadan',
                'tb_pemeriksaan.lingkar_pinggul AS lingkarPinggul',
                'tb_pemeriksaan.lingkar_dada AS lingkarDada',
                'tb_pemeriksaan.kondisi_gigi AS kondisiGigi',
            ])
            ->where('no_induk',$noInduk)
            ->get();

            $rawatInap = RawatInap::select([
                'rawat_inap.tanggal_masuk AS tanggalMasuk',
                'rawat_inap.keluhan',
                'rawat_inap.terapi',
                'rawat_inap.tanggal_keluar AS tanggalKeluar',
            ])
            ->where('santri_no_induk',$noInduk)
            ->get();

            $data = [
                'status'   => 200,
                'message'   => 'Berhasil mengambil data',
                'data'  =>  [
                    'riwayatSakit' => $RiwayatSakit,
                    'pemeriksaan'    =>  $Pemeriksaan,
                    'rawatInap'    =>  $rawatInap
                ]
            ];

            return response()->json($data, 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    private function konversiNilaiHuruf($nilai)
    {
        return match ((int) $nilai) {
            4 => 'A',
            3 => 'B',
            2 => 'C',
            1 => 'D',
            0 => 'E',
            default => '-',
        };
    }

    public function ketahfidzan($noInduk)
    {
        try{
            $ketahfidzan = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.tanggal',
                'detail_santri_tahfidz.hafalan',
                'detail_santri_tahfidz.tilawah',
                'detail_santri_tahfidz.kefasihan',
                'detail_santri_tahfidz.daya_ingat AS dayaIngat',
                'detail_santri_tahfidz.kelancaran',
                'detail_santri_tahfidz.praktek_tajwid AS praktekTajwid',
                'detail_santri_tahfidz.makhroj',
                'detail_santri_tahfidz.tanafus',
                'detail_santri_tahfidz.waqof_wasol AS waqofWasol',
                'detail_santri_tahfidz.ghorib',
                'kode_juz.nama as nmJuz'
            ])
            ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('detail_santri_tahfidz.no_induk', $noInduk)
            ->whereNotNull('kode_juz.nama')
            ->where('kode_juz.nama', '!=', '')
            ->orderBy('detail_santri_tahfidz.tanggal', 'desc')
            ->get()
            ->map(function ($item) {
                $item->tanggalTahfidzan = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->hafalan          = $this->konversiNilaiHuruf($item->hafalan);
                $item->tilawah          = $this->konversiNilaiHuruf($item->tilawah);
                $item->kefasihan        = $this->konversiNilaiHuruf($item->kefasihan);
                $item->dayaIngat        = $this->konversiNilaiHuruf($item->dayaIngat);
                $item->kelancaran       = $this->konversiNilaiHuruf($item->kelancaran);
                $item->praktekTajwid    = $this->konversiNilaiHuruf($item->praktekTajwid);
                $item->makhroj          = $this->konversiNilaiHuruf($item->makhroj);
                $item->tanafus          = $this->konversiNilaiHuruf($item->tanafus);
                $item->waqofWasol       = $this->konversiNilaiHuruf($item->waqofWasol);
                $item->ghorib           = $this->konversiNilaiHuruf($item->ghorib);

                return $item;
            });

            $groupedData = [];
            foreach ($ketahfidzan as $row) {
                $tahun = date('Y', strtotime($row->tanggal));
                $bulan = date('m', strtotime($row->tanggal));

                // Konversi bulan angka ke nama bulan Indonesia
                $bulanNama = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];

                $namaBulan = $bulanNama[$bulan] ?? $bulan;

                // Simpan data dalam array terstruktur per tahun
                $groupedData[$tahun][$namaBulan][] = $row;
            }

            $data['detailSantri'] = SantriDetail::select([
                'santri_detail.nama',
                'santri_detail.no_induk AS noInduk',
            ])->where('no_induk', $noInduk)->get();

            $data['ketahfidzan'] = $groupedData;

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);

        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function perilaku($noInduk)
    {
        try{
            $labelPerilaku = ['Kurang Baik', 'Cukup', 'Baik'];

            $perilaku = Perilaku::select([
                'perilaku.tanggal',
                'perilaku.ketertiban',
                'perilaku.kebersihan',
                'perilaku.kedisiplinan',
                'perilaku.kerapian',
                'perilaku.kesopanan',
                'perilaku.kepekaan_lingkungan AS kepekaanLingkungan',
                'perilaku.ketaatan_peraturan AS ketaatanPeraturan',
            ])
            ->orderBy('tanggal', 'desc')
            ->where('no_induk', $noInduk)
            ->get()
            ->map(function ($item) use ($labelPerilaku) {
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                $item->ketertiban = $labelPerilaku[$item->ketertiban] ?? '-';
                $item->kebersihan = $labelPerilaku[$item->kebersihan] ?? '-';
                $item->kedisiplinan = $labelPerilaku[$item->kedisiplinan] ?? '-';
                $item->kerapian = $labelPerilaku[$item->kerapian] ?? '-';
                $item->kesopanan = $labelPerilaku[$item->kesopanan] ?? '-';
                $item->kepekaanLingkungan = $labelPerilaku[$item->kepekaanLingkungan] ?? '-';
                $item->ketaatanPeraturan = $labelPerilaku[$item->ketaatanPeraturan] ?? '-';

                return $item;
            });

            $data = [
                'status'   => 200,
                'message'   => 'Berhasil mengambil data',
                'data'  =>  $perilaku
            ];

            return response()->json($data, 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function kelengkapan($noInduk)
    {
        try{
            $labelKelengkapan = ['Tidak Lengkap', 'Lengkap & Kurang baik', 'lengkap & baik'];

            $kelengkapan = Kelengkapan::select([
                'tanggal',
                'perlengkapan_mandi AS perlengkapanMandi',
                'catatan_mandi AS catatanMandi',
                'peralatan_sekolah AS peralatanSekolah',
                'catatan_sekolah AS catatanSekolah',
                'perlengkapan_diri AS perlengkapanDiri',
                'catatan_diri AS catatanDiri',
            ])
            ->orderBy('tanggal', 'desc')
            ->where('no_induk', $noInduk)
            ->get()
            ->map(function ($item) use ($labelKelengkapan) {
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                $item->perlengkapanMandi = $labelKelengkapan[$item->perlengkapanMandi] ?? '-';
                $item->peralatanSekolah = $labelKelengkapan[$item->peralatanSekolah] ?? '-';
                $item->perlengkapanDiri = $labelKelengkapan[$item->perlengkapanDiri] ?? '-';

                return $item;
            });

            $data = [
                'status'   => 200,
                'message'   => 'Berhasil mengambil data',
                'data'  =>  $kelengkapan
            ];

            return response()->json($data, 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function laporBayar(Request $request)
    {
        if($request->validate([
            'bukti' => [
                'required',
                File::types(['jpg', 'jpeg', 'png', 'pdf'])->max(10 * 1024), // maks 10MB
            ],
        ]))
        {
            $data2 = [
                'nama_santri' => $request->noInduk,
                'jumlah' => $request->jumlah,
                'tanggal_bayar' => $request->tanggalBayar,
                'periode' => $request->periode,
                'tahun' => $request->tahun,
                'bank_pengirim' => $request->bankPengirim,
                'atas_nama' => $request->atasNama,
                'no_wa' => $request->noWa,
                'is_hapus' => 0,
            ];
            $cek = pembayaran::where($data2)->count();
            $data = [];
            if($cek > 0){
                return response()->json([
                    'status'    => 409,
                    'message'   => 'Data sudah ada.',
                ], 409);
            }

            if($request->file('bukti')){

                $file = $request->file('bukti');
                $ekstensi = $file->extension();
                if(strtolower($ekstensi) == 'jpg' || strtolower($ekstensi) == 'png' || strtolower($ekstensi) == 'jpeg'){
                    $filename = date('YmdHis') . $file->getClientOriginalName();

                    $kompres = Image::make($file)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('assets/upload/bukti_bayar/' . $filename);

                }else{
                    $filename = date('YmdHis') . $file->getClientOriginalName();
                    $file->move('assets/upload/bukti_bayar/',$filename);
                }
                $data = [
                    'nama_santri' => $request->noInduk,
                    'jumlah' => $request->jumlah,
                    'tanggal_bayar' => $request->tanggalBayar,
                    'periode' => $request->periode,
                    'tahun' => $request->tahun,
                    'bank_pengirim' => $request->bankPengirim,
                    'atas_nama' => $request->atasNama,
                    'no_wa' => $request->noWa,
                    'catatan' => $request->catatan,
                    'created_at' => date('Y-m-d H:i:s'),
                    'bukti' => $filename,
                    'input_by' => 3, //input lewat api / aplikasi
                ];
                $insertPembayaran = pembayaran::insert($data);
                $id = DB::getPdo()->lastInsertId();
                $jenisPembayaran = $request->jenisPembayaran;
                $idJenisPembayaran = $request->idJenisPembayaran;
                $totalRincian = 0;

                foreach($jenisPembayaran as $key=>$value){
                    if($value != 0 && !empty($value)){

                        $dataDetail = [
                            'id_pembayaran'=>$id,
                            'id_jenis_pembayaran' => $idJenisPembayaran[$key],
                            'nominal' => $value,
                        ];
                        $query = detailPembayaran::insert($dataDetail);
                        $totalRincian += $value;
                    }

                    if($idJenisPembayaran == 3){
                        $data_saku = [
                            'dari' => 1,
                            'jumlah' => $value,
                            'tanggal' => $request->tanggalBayar,
                            'no_induk' => $request->noInduk,
                            'id_pembayaran' => $id,
                            'status_pembayaran' => 0
                        ];
                        $query2 = SakuMasuk::insert($data_saku);
                    }
                }

                // if($totalRincian != $request->jumlah)
                // {
                //     return response()->json([
                //         'status'    => 422,
                //         'message'   => 'Total pembayaran dan rincian pembayaran tidak sama.',
                //     ], 422);
                // }

                $dataSantri = DetailSantri::where('no_induk', $request->noInduk)->first();
$message = '[     dari mobile PPATQ-RF ku   ]

Yth. Bp/Ibu *' . $request->atasNama . '*, Wali Santri *' . $dataSantri->nama . '* kelas *' . $dataSantri->kelas . '* telah melaporkan pembayaran bulan *' .   $this->getNamaBulan($request->periode) . '* 
Rp. ' . $request->jumlah . ' rincian sbb : 
';
$jenis = RefJenisPembayaran::orderBy('urutan', 'asc')->get();
$listJenis = [];
foreach($jenis as $row){
	$listJenis[$row->id] = $row->jenis;
}

$detail = detailPembayaran::where('id_pembayaran', $id)->get();
foreach($detail as $row){
	$message .= '• ' . $listJenis[$row->id_jenis_pembayaran] .' sebesar Rp. ' . number_format($row->nominal,0,',','.') . ' 
';

}

					$message .= '
Tunggu beberapa saat, pencatatan akan dilakukan & segera memberikan status pembayaran tersebut.

No. WA konfirmasi di +62 877-6757-2025. 

gunakan dan manfaatkan aplikasi PPATQ-RF ku untuk media pendampingan antara lembaga / pondok dengan wali santri. Update informasi yang tersaji pada aplikasi. 

Mohon maaf, apabila ada kekurangan atau sedikit kekeliruan, karena app ini masih terus dikembangkan untuk disesuaikan dengan kebutuhan semua elemen lembaga civitas PPATQ-RF. 

Untuk itu, maka kami berharap sumbang saran serta laporan temuan problem yang muncul selama penggunaan. Hubungi kami melalui menu saran pada aplikasi di dalam app atau kirim WA di  +62 818-240-102

Informasi mengenai informasi, berita dan detail santri melalui media yang lebih luas, dapat melalui https: www.ppatq-rf.sch.id
';

$message .= '
Kami ucapkan banyak terima kasih kepada (Bp/Ibu) ' . $request->atasNama . ', salam kami kepada keluarga.

Semoga pekerjaan dan usahanya diberikan kelancaran dan menghasilkan Rizqi yang banyak dan berkah, aamiin.
';

                
                if($insertPembayaran){

                    try {
                        $data = [
                            'id_pembayaran' => $id,
                            'nama' => $request->atasNama,
                            'no_wa' => $request->noWa,
                            'pesan' => $message,
                            'tanggal_kirim' => now(),
                        ];

                        $hasil = SendWA::create($data);
                        $sendWa = Helpers_wa::send_wa($data);

                        $responseDecoded = json_decode($sendWa, true);

                        return response()->json([
                            'status' => 201,
                            'message' => 'Data berhasil dimasukkan',
                            'data' => $responseDecoded
                        ], 201);

                    } catch (\Exception $e) {
                        return response()->json([
                            'status' => 500,
                            'message' => 'Terjadi kesalahan saat mengirim pesan WA',
                            // 'error' => $e->getMessage() // Boleh di-nonaktifkan di production untuk alasan keamanan
                        ], 500);
                    }
                }else{
                    return response()->json([
                        'status' => 500,
                        'message' => 'Terjadi kesalahan saat mengirim pesan WA',
                    ], 500);
                }
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => 'File yang di upload tidak valid',
                ], 400);
            }
        }else{
            return response()->json([
                'message'   => "masuk elsess"
            ], 402);
        }
    }

    public function riwayatBayar($noInduk)
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $refBayar = RefJenisPembayaran::orderBy('urutan', 'asc')->get();
        $pembayaranList = pembayaran::where([
            'nama_santri' => $noInduk,
            'is_hapus' => 0
            ])
            ->orderBy('id','desc')
            ->get();

        $detailPembayaran = [];

		foreach ($pembayaranList as $pembayaran) {
            // Inisialisasi semua jenis pembayaran dengan 0
            foreach ($refBayar as $jenis) {
                $detailPembayaran[$pembayaran->id][$jenis->id] = 0;
            }

            // Ambil detail pembayaran dari tabel tb_detail_pembayaran
            $detail = DetailPembayaran::where('id_pembayaran', $pembayaran->id)->get();

            foreach ($detail as $row) {
                $detailPembayaran[$pembayaran->id][$row->id_jenis_pembayaran] = $row->nominal;
            }
        }

        $response = [];

        foreach ($pembayaranList as $pem) {
            $baris = [];

            // Tombol cetak
            // $baris['cetak'] = '<a href="' . url('pembayaran/print_bukti/' . $pem->id) . '" class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>';

            // Tanggal bayar
            $baris['tanggalBayar'] = Carbon::parse($pem->tanggal_bayar)->translatedFormat('d F Y');

            // Nama bulan dari periode
            $baris['periode'] = $bulan[$pem->periode] ?? '-';

            // Detail jenis pembayaran
            foreach ($refBayar as $jenis) {
                $nominal = $detailPembayaran[$pem->id][$jenis->id] ?? 0;
                $baris['jenisPembayaran'][$jenis->id] = number_format($nominal, 0, ",", ".");
            }

            // Validasi
            switch ($pem->validasi) {
                case 0:
                    $baris['validasi'] = "Belum di Validasi";
                    break;
                case 1:
                    $baris['validasi'] = "Sudah di Validasi " . ($bulan[$pem->periode] ?? '') . "  klik tombol cetak ijo";
                    break;
                case 2:
                    $baris['validasi'] = "Validasi Ditolak";
                    break;
                default:
                    $baris['validasi'] = "";
            }

            $response[] = $baris;
        }

        $data = [
            'jenisPembayaran'  => $refBayar,
            'data'  => $response,
        ];

        return response()->json([
            "status"  => 200,
            "message" => "Berhasil mengambil data",
            "data"    => $data
        ], 200);
    }
}   
