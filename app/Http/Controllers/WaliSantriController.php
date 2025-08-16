<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Izin;

use App\Models\SendWA;
use App\Models\Keluhan;
use App\Models\Kerapian;
use App\Models\Perilaku;
use App\Models\Kesehatan;
use App\Models\RawatInap;
use App\Models\SakuMasuk;
use App\Models\pembayaran;
use App\Models\SakuKeluar;
use App\Models\Kelengkapan;
use App\Models\Pelanggaran;
use App\Models\DetailSantri;

use App\Models\Perlengkapan;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use App\Models\TbPemeriksaan;

use App\Http\Helpers\Helpers_wa;
use App\Models\detailPembayaran;

use Illuminate\Http\JsonResponse;

use App\Models\RefJenisPembayaran;
use Illuminate\Support\Facades\DB;
use App\Models\DetailSantriTahfidz;

use Illuminate\Support\Facades\Http;
use App\Models\PelanggaranKetertiban;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Facades\Image;
use App\Http\Resources\WaliSantriResource;
use App\Http\Requests\LoginWaliSantriRequest;
use App\Models\JenisPembayaran;
use Illuminate\Http\Exceptions\HttpResponseException;

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
                        'Login gagal. Harap pastikan data yang anda masukkan benar.'
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
            'cities.city_name AS asalKota',
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
        ->leftJoin('cities', 'cities.city_id', '=', 'santri_detail.kabkota')
        ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
        ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
        ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
        ->leftJoin('employee_new AS murroby', 'murroby.id', '=', 'ref_kamar.employee_id')
        ->where('santri_detail.status', 0)
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

            $nowFormatted = Carbon::now()->translatedFormat('l d F Y, H:i');

$kelas = strtoupper($hasil->kelas);

$message = "🎉 Selamat datang

Walisantri {$hasil->nama}. dari {$hasil->asalKota}, Kelas {$kelas}, Murroby {$hasil->namaMurroby}.

{$nowFormatted}

Informasi lain juga dapat diakses melalui www.ppatq-rf.sch.id
";

            // kirim wa
            $data = [
                'no_wa' => $hasil->no_hp,
                'pesan' => $message
            ];

            $sendWa = Helpers_wa::send_wa($data);

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

    public function saldo($noInduk)
    {
        $saldo = DetailSantri::select([
            'santri_detail.nama',
            'santri_detail.photo',
            'tb_uang_saku.jumlah AS saldo',
        ])
        ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
        ->where('santri_detail.status', 0)
        ->where('santri_detail.no_induk', $noInduk)
        ->first();

        if ($saldo) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil mengambil data.',
                'data' => $saldo
            ], 200);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Data saldo tidak ditemukan'
        ], 404);
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
            ->get()
            ->map(function ($item) {
                $item->tanggalSakit = $item->tanggalSakit ? Carbon::parse($item->tanggalSakit)->translatedFormat('d F Y') : '-';
                $item->tanggalSembuh = $item->tanggalSembuh ? Carbon::parse($item->tanggalSembuh)->translatedFormat('d F Y') : '-';

                return $item;
            });

            $Pemeriksaan = TbPemeriksaan::select([
                'tb_pemeriksaan.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tb_pemeriksaan.tinggi_badan AS tinggiBadan',
                'tb_pemeriksaan.berat_badan AS beratBadan',
                'tb_pemeriksaan.lingkar_pinggul AS lingkarPinggul',
                'tb_pemeriksaan.lingkar_dada AS lingkarDada',
                'tb_pemeriksaan.kondisi_gigi AS kondisiGigi',
            ])
            ->where('no_induk',$noInduk)
            ->orderBy('tb_pemeriksaan.tanggal_pemeriksaan', 'desc')
            ->get()
            ->map(function ($item) {
                $item->tanggalPemeriksaan = $item->tanggalPemeriksaan ? Carbon::parse($item->tanggalPemeriksaan)->translatedFormat('d F Y') : '-';

                return $item;
            });

            $rawatInap = RawatInap::select([
                'rawat_inap.tanggal_masuk AS tanggalMasuk',
                'rawat_inap.keluhan',
                'rawat_inap.terapi',
                'rawat_inap.tanggal_keluar AS tanggalKeluar',
            ])
            ->where('santri_no_induk',$noInduk)
            ->get()
            ->map(function ($item) {
                $item->tanggalMasuk = $item->tanggalMasuk ? Carbon::parse($item->tanggalMasuk)->translatedFormat('d F Y') : '-';
                $item->tanggalKeluar = $item->tanggalKeluar ? Carbon::parse($item->tanggalKeluar)->translatedFormat('d F Y') : '-';

                return $item;
            });

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    private function konversiNilaiHuruf($nilai)
    {
        if ($nilai === null) {
            return '-';
        }

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
            ])->where('no_induk', $noInduk)->where('santri_detail.status', 0)->get();

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->translatedFormat('d F Y') : '-';

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->translatedFormat('d F Y') : '-';

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function perlengkapan($noInduk)
    {
        try{
            $data = Perlengkapan::select([
                'perlengkapan.id',
                'santri_detail.nama',
                'perlengkapan.tanggal',
                'perlengkapan.buku AS buku',
                'perlengkapan.buku_layak AS bukuLayak',
                'perlengkapan.pensil AS pensil',
                'perlengkapan.pensil_layak AS pensilLayak',
                'perlengkapan.bolpoin AS bolpoin',
                'perlengkapan.bolpoin_layak AS bolpoinLayak',
                'perlengkapan.penghapus AS penghapus',
                'perlengkapan.penghapus_layak AS penghapusLayak',
                'perlengkapan.penyerut AS penyerut',
                'perlengkapan.penyerut_layak AS penyerutLayak',
                'perlengkapan.penggaris AS penggaris',
                'perlengkapan.penggaris_layak AS penggarisLayak',
                'perlengkapan.box_pensil AS boxPensil',
                'perlengkapan.box_pensil_layak AS boxPensilLayak',
                'perlengkapan.putih AS putih',
                'perlengkapan.putih_layak AS putihLayak',
                'perlengkapan.batik AS batik',
                'perlengkapan.batik_layak AS batikLayak',
                'perlengkapan.coklat AS coklat',
                'perlengkapan.coklat_layak AS coklatLayak',
                'perlengkapan.kerudung AS kerudung',
                'perlengkapan.kerudung_layak AS kerudungLayak',
                'perlengkapan.peci AS peci',
                'perlengkapan.peci_layak AS peciLayak',
                'perlengkapan.kaos_kaki AS kaosKaki',
                'perlengkapan.kaos_kaki_layak AS kaosKakiLayak',
                'perlengkapan.sepatu AS sepatu',
                'perlengkapan.sepatu_layak AS sepatuLayak',
                'perlengkapan.ikat_pinggang AS ikatPinggang',
                'perlengkapan.ikat_pinggang_layak AS ikatPinggangLayak',
                'perlengkapan.mukenah AS mukenah',
                'perlengkapan.mukenah_layak AS mukenahLayak',
                'perlengkapan.al_quran AS alQuran',
                'perlengkapan.al_quran_layak AS alQuranLayak',
                'perlengkapan.jubah_ppatq AS jubahPpatq',
                'perlengkapan.jubah_ppatq_layak AS jubahPpatqLayak',
                'perlengkapan.baju_hijau_stel AS bajuHijauStel',
                'perlengkapan.baju_hijau_stel_layak AS bajuHijauStelLayak',
                'perlengkapan.baju_ungu_stel AS bajuUnguStel',
                'perlengkapan.baju_ungu_stel_layak AS bajuUnguStelLayak',
                'perlengkapan.baju_merah_stel AS bajuMerahStel',
                'perlengkapan.baju_merah_stel_layak AS bajuMerahStelLayak',
                'perlengkapan.kaos_hijau_stel AS kaosHijauStel',
                'perlengkapan.kaos_merah_stel_layak AS kaosMerahStelLayak',
                'perlengkapan.kaos_ungu_stel AS kaosUnguStel',
                'perlengkapan.kaos_ungu_stel_layak AS kaosUnguStelLayak',
                'perlengkapan.kaos_kuning_stel AS kaosKuningStel',
                'perlengkapan.kaos_kuning_stel_layak AS kaosKuningStelLayak',
                'perlengkapan.sabun AS sabun',
                'perlengkapan.sabun_layak AS sabunLayak',
                'perlengkapan.shampo AS shampo',
                'perlengkapan.shampo_layak AS shampoLayak',
                'perlengkapan.sikat AS sikat',
                'perlengkapan.sikat_layak AS sikatLayak',
                'perlengkapan.pasta_gigi AS pastaGigi',
                'perlengkapan.pasta_gigi_layak AS pastaGigiLayak',
                'perlengkapan.kotak_sabun AS kotakSabun',
                'perlengkapan.kotak_sabun_layak AS kotakSabunLayak',
                'perlengkapan.handuk AS handuk',
                'perlengkapan.handuk_layak AS handukLayak',
                'perlengkapan.kasur AS kasur',
                'perlengkapan.kasur_layak AS kasurLayak',
                'perlengkapan.bantal AS bantal',
                'perlengkapan.bantal_layak AS bantalLayak',
                'perlengkapan.guling AS guling',
                'perlengkapan.guling_layak AS gulingLayak',
                'perlengkapan.sarung_bantal AS sarungBantal',
                'perlengkapan.sarung_banta_layakl AS sarungBantalLayak',
                'perlengkapan.sarung_guling AS sarungGuling',
                'perlengkapan.sarung_guling_layak AS sarungGulingLayak',
                'perlengkapan.sandal AS sandal',
                'perlengkapan.sandal_layak AS sandalLayak',
                'perlengkapan.keterangan AS keterangan',
                'employee_new.nama AS namaPengisi'
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'perlengkapan.no_induk')
            ->leftJoin('users', 'users.id', '=', 'perlengkapan.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('perlengkapan.no_induk', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('perlengkapan.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->buku = match ($item->buku) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bukuLayak = match ($item->bukuLayak) { // Note: Changed to $item->bukuLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->pensil = match ($item->pensil) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->pensilLayak = match ($item->pensilLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bolpoin = match ($item->bolpoin) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bolpoinLayak = match ($item->bolpoinLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penghapus = match ($item->penghapus) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penghapusLayak = match ($item->penghapusLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penyerut = match ($item->penyerut) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penyerutLayak = match ($item->penyerutLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penggaris = match ($item->penggaris) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penggarisLayak = match ($item->penggarisLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->boxPensil = match ($item->boxPensil) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->boxPensilLayak = match ($item->boxPensilLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->putih = match ($item->putih) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->putihLayak = match ($item->putihLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->batik = match ($item->batik) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->batikLayak = match ($item->batikLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->coklat = match ($item->coklat) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->coklatLayak = match ($item->coklatLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kerudung = match ($item->kerudung) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kerudungLayak = match ($item->kerudungLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->peci = match ($item->peci) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->peciLayak = match ($item->peciLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosKaki = match ($item->kaosKaki) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosKakiLayak = match ($item->kaosKakiLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sepatu = match ($item->sepatu) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sepatuLayak = match ($item->sepatuLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->ikatPinggang = match ($item->ikatPinggang) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->ikatPinggangLayak = match ($item->ikatPinggangLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->mukenah = match ($item->mukenah) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->mukenahLayak = match ($item->mukenahLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->alQuran = match ($item->alQuran) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->alQuranLayak = match ($item->alQuranLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->jubahPpatq = match ($item->jubahPpatq) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->jubahPpatqLayak = match ($item->jubahPpatqLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuHijauStel = match ($item->bajuHijauStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuHijauStelLayak = match ($item->bajuHijauStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuUnguStel = match ($item->bajuUnguStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuUnguStelLayak = match ($item->bajuUnguStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuMerahStel = match ($item->bajuMerahStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuMerahStelLayak = match ($item->bajuMerahStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosHijauStel = match ($item->kaosHijauStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosMerahStelLayak = match ($item->kaosMerahStelLayak) { // Corrected from kaos_merah_stel to kaosMerahStelLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosUnguStel = match ($item->kaosUnguStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosUnguStelLayak = match ($item->kaosUnguStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosKuningStel = match ($item->kaosKuningStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosKuningStelLayak = match ($item->kaosKuningStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sabun = match ($item->sabun) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sabunLayak = match ($item->sabunLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->shampo = match ($item->shampo) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->shampoLayak = match ($item->shampoLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sikat = match ($item->sikat) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sikatLayak = match ($item->sikatLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->pastaGigi = match ($item->pastaGigi) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->pastaGigiLayak = match ($item->pastaGigiLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kotakSabun = match ($item->kotakSabun) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kotakSabunLayak = match ($item->kotakSabunLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->handuk = match ($item->handuk) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->handukLayak = match ($item->handukLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kasur = match ($item->kasur) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kasurLayak = match ($item->kasurLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bantal = match ($item->bantal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bantalLayak = match ($item->bantalLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->guling = match ($item->guling) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->gulingLayak = match ($item->gulingLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sarungBantal = match ($item->sarungBantal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sarungBantalLayak = match ($item->sarungBantalLayak) { // Corrected from sarung_banta_layakl to sarungBantalLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sarungGuling = match ($item->sarungGuling) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sarungGulingLayak = match ($item->sarungGulingLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sandal = match ($item->sandal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sandalLayak = match ($item->sandalLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                return $item;
            });

            if ($data->isEmpty()) {
                $data = [[
                    'id' => '-',
                    'nama' => '-',
                    'perlengkapan.tanggal' => '-',
                    'buku' => '-',
                    'bukuLayak' => '-',
                    'pensil' => '-',
                    'pensilLayak' => '-',
                    'bolpoin' => '-',
                    'bolpoinLayak' => '-',
                    'penghapus' => '-',
                    'penghapusLayak' => '-',
                    'penyerut' => '-',
                    'penyerutLayak' => '-',
                    'penggaris' => '-',
                    'penggarisLayak' => '-',
                    'boxPensil' => '-',
                    'boxPensilLayak' => '-',
                    'putih' => '-',
                    'putihLayak' => '-',
                    'batik' => '-',
                    'batikLayak' => '-',
                    'coklat' => '-',
                    'coklatLayak' => '-',
                    'kerudung' => '-',
                    'kerudungLayak' => '-',
                    'peci' => '-',
                    'peciLayak' => '-',
                    'kaosKaki' => '-',
                    'kaosKakiLayak' => '-',
                    'sepatu' => '-',
                    'sepatuLayak' => '-',
                    'ikatPinggang' => '-',
                    'ikatPinggangLayak' => '-',
                    'mukenah' => '-',
                    'mukenahLayak' => '-',
                    'alQuran' => '-',
                    'alQuranLayak' => '-',
                    'jubahPpatq' => '-',
                    'jubahPpatqLayak' => '-',
                    'bajuHijauStel' => '-',
                    'bajuHijauStelLayak' => '-',
                    'bajuUnguStel' => '-',
                    'bajuUnguStelLayak' => '-',
                    'bajuMerahStel' => '-',
                    'bajuMerahStelLayak' => '-',
                    'kaosHijauStel' => '-',
                    'kaosMerahStelLayak' => '-',
                    'kaosUnguStel' => '-',
                    'kaosUnguStelLayak' => '-',
                    'kaosKuningStel' => '-',
                    'kaosKuningStelLayak' => '-',
                    'sabun' => '-',
                    'sabunLayak' => '-',
                    'shampo' => '-',
                    'shampoLayak' => '-',
                    'sikat' => '-',
                    'sikatLayak' => '-',
                    'pastaGigi' => '-',
                    'pastaGigiLayak' => '-',
                    'kotakSabun' => '-',
                    'kotakSabunLayak' => '-',
                    'handuk' => '-',
                    'handukLayak' => '-',
                    'kasur' => '-',
                    'kasurLayak' => '-',
                    'bantal' => '-',
                    'bantalLayak' => '-',
                    'guling' => '-',
                    'gulingLayak' => '-',
                    'sarungBantal' => '-',
                    'sarungBantalLayak' => '-',
                    'sarungGuling' => '-',
                    'sarungGulingLayak' => '-',
                    'sandal' => '-',
                    'sandalLayak' => '-',
                    'keterangan' => '-',
                    'namaPengisi' => '-'
                ]];
            }
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function pelanggaran($noInduk)
    {
        try{
            $data = Pelanggaran::select([
                'pelanggaran.id',
                'santri_detail.nama',
                'pelanggaran.tanggal',
                'pelanggaran.jenis AS jenisPelanggaran',
                'pelanggaran.kategori',
                'pelanggaran.hukuman',
                'pelanggaran.bukti',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'pelanggaran.no_induk')
            ->leftJoin('users', 'users.id', '=', 'pelanggaran.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('pelanggaran.no_induk', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('pelanggaran.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->kategori = match ($item->kategori) {
                    1 => "Ringan",
                    2 => "Berat",
                    default => "-"
                };

                return $item;
            });

            if ($data->isEmpty()) {
                $data = [[
                    'id' => '-',
                    'nama' => '-',
                    'tanggal' => '-',
                    'jenisPelanggaran' => '-',
                    'kategori' => '-',
                    'hukuman' => '-',
                    'bukti' => '-',
                    'namaPengisi' => '-',
                ]];
            }
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function izin($noInduk)
    {
        try{
            $data = Izin::select([
                'izin.id',
                'santri_detail.nama',
                'izin.tanggal',
                'izin.keluar',
                'izin.kembali',
                'izin.status',
                'izin.kategori',
                'izin.kategori_pelanggaran AS kategoriPelanggaran',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'izin.no_induk')
            ->leftJoin('users', 'users.id', '=', 'izin.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('izin.no_induk', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('izin.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');
                $item->keluar = Carbon::parse($item->keluar)->translatedFormat('H:i');
                $item->kembali = Carbon::parse($item->kembali)->translatedFormat('H:i');

                $item->status = match ($item->status) {
                    0 => "Tidak Izin",
                    1 => "Izin",
                    default => "-"
                };

                $item->kategori = match ($item->kategori) {
                    1 => "Izin Sambangan",
                    2 => "Izin Pulang",
                    default => "-"
                };

                $item->kategoriPelanggaran = match ($item->kategoriPelanggaran) {
                    1 => "Ringan",
                    2 => "Berat",
                    default => "-"
                };

                return $item;
            });

            if ($data->isEmpty()) {
                $data = [[
                    'id' => '-',
                    'nama' => '-',
                    'tanggal' => '-',
                    'keluar' => '-',
                    'kembali' => '-',
                    'status' => '-',
                    'kategori' => '-',
                    'kategoriPelanggaran' => '-',
                    'namaPengisi' => '-',
                ]];
            }
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function kerapian($noInduk)
    {
        try{
            $data = Kerapian::select([
                'kerapian.id',
                'kerapian.tanggal',
                'santri_detail.nama',
                'kerapian.sandal',
                'kerapian.sepatu',
                'kerapian.box_jajan AS boxJajan',
                'kerapian.alat_mandi AS alatMandi',
                'kerapian.tindak_lanjut AS tindakLanjut',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'kerapian.no_induk')
            ->leftJoin('users', 'users.id', '=', 'kerapian.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('kerapian.no_induk', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('kerapian.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->sandal = match ($item->sandal) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->sepatu = match ($item->sepatu) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->boxJajan = match ($item->boxJajan) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->alatMandi = match ($item->alatMandi) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                return $item;
            });

            if ($data->isEmpty()) {
                $data = [[
                    'id' => '-',
                    'tanggal' => '-',
                    'nama' => '-',
                    'sandal' => '-',
                    'sepatu' => '-',
                    'boxJajan' => '-',
                    'alatMandi' => '-',
                    'tindakLanjut' => '-',
                    'namaPengisi' => '-',
                ]];
            }
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function pelanggaranKetertiban($noInduk)
    {
        try{
            $data = PelanggaranKetertiban::select([
                'pelanggaran_ketertiban.id',
                'pelanggaran_ketertiban.tanggal',
                'santri_detail.nama',
                'pelanggaran_ketertiban.buang_sampah AS buangSampah',
                'pelanggaran_ketertiban.menata_peralatan AS menataPeralatan',
                'pelanggaran_ketertiban.tidak_berseragam AS tidakBerseragam',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'pelanggaran_ketertiban.no_induk')
            ->leftJoin('users', 'users.id', '=', 'pelanggaran_ketertiban.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('pelanggaran_ketertiban.no_induk', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('pelanggaran_ketertiban.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                return $item;
            });

            if ($data->isEmpty()) {
                $data = [[
                    'id' => '-',
                    'tanggal' => '-',
                    'nama' => '-',
                    'buangSampah' => '-',
                    'menataPeralatan' => '-',
                    'tidakBerseragam' => '-',
                    'namaPengisi' => '-',
                ]];
            }
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function keluhan($noInduk)
    {
        try{
            $data = Keluhan::select([
                'tb_keluhan.id AS idKeluhan',
                'reply_keluhan.id AS idBalasan',
                'tb_keluhan.nama_pelapor AS namaPelapor',
                'tb_keluhan.email',
                'tb_keluhan.no_hp AS noHp',
                'santri_detail.nama AS namaSantri',
                'tb_keluhan.nama_wali_santri AS namaWaliSantri',
                'ref_kategori.nama AS kategori',
                'tb_keluhan.jenis',
                'tb_keluhan.status',
                'tb_keluhan.masukan',
                'tb_keluhan.saran',
                'tb_keluhan.rating',
                'reply_keluhan.pesan AS balasan',
                'tb_keluhan.created_at',
            ])
            ->leftJoin('reply_keluhan', 'reply_keluhan.id_keluhan', '=', 'tb_keluhan.id')
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'tb_keluhan.id_santri')
            ->leftJoin('ref_kategori', 'ref_kategori.id', '=', 'tb_keluhan.id_kategori')
            ->where('tb_keluhan.is_hapus', 0)
            ->where('tb_keluhan.id_santri', $noInduk)
            ->where('santri_detail.status', 0)
            ->orderBy('tb_keluhan.created_at', 'desc')
            ->get()
            ->map(function($item){
                $item->status = match ($item->status) {
                    1 => 'Belum Ditangani',
                    2 => 'Ditangani',
                    default => 'Status tidak diketahui',
                };
                $item->diuploadPada = $item->created_at ? Carbon::parse($item->created_at)->translatedFormat('d F Y') : '-';

                return $item;
            })
            ->groupBy('status');

            return response()->json([
                    "status"  => 200,
                    "message" => "Berhasil mengambil data",
                    "data"    => $data
                ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function laporBayar(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->validate([
                'bukti' => [
                    'required',
                    File::types(['jpg', 'jpeg', 'png', 'pdf'])->max(10 * 1024), // maks 10MB
                ],
            ]))
            {
                $noInduk = $request->noInduk;
                $atasNama = ucfirst($request->atasNama);
                $jumlah = $request->jumlah;
                $tanggalBayar = $request->tanggalBayar;
                $periode = $request->periode;
                $tahun = $request->tahun;
                $bankPengirim = $request->bankPengirim;
                $noWa = $request->noWa;

                $data2 = [
                    'nama_santri' => $noInduk,
                    'jumlah' => $jumlah,
                    'tanggal_bayar' => $tanggalBayar,
                    'periode' => $periode,
                    'tahun' => $tahun,
                    'bank_pengirim' => $bankPengirim,
                    'atas_nama' => $atasNama,
                    'no_wa' => $noWa,
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
                        $fileName = date('YmdHis') . $file->getClientOriginalName();

                        $kompres = Image::make($file)
                        ->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save('assets/upload/bukti_bayar/' . $fileName);

                    }else{
                        $fileName = date('YmdHis') . $file->getClientOriginalName();
                        $file->move('assets/upload/bukti_bayar/',$fileName);
                    }

                    if(is_null($request->catatan)){
                        return response()->json([
                            'status'    => 422,
                            'message'   => 'Catatan tidak boleh kosong.',
                        ], 422);
                    }

                    $data = [
                        'nama_santri' => $noInduk,
                        'jumlah' => $jumlah,
                        'tanggal_bayar' => $tanggalBayar,
                        'periode' => $periode,
                        'tahun' => $tahun,
                        'bank_pengirim' => $bankPengirim,
                        'atas_nama' => $atasNama,
                        'no_wa' => $noWa,
                        'catatan' => $request->catatan,
                        'tipe' => 'Bank',
                        'created_at' => date('Y-m-d H:i:s'),
                        'bukti' => $fileName,
                        'input_by' => 3, //input lewat api / aplikasi
                    ];
                    $insertPembayaran = pembayaran::insert($data);
                    $id = DB::getPdo()->lastInsertId();
                    $jenisPembayaran = $request->jenisPembayaran;
                    $idJenisPembayaran = $request->idJenisPembayaran;
                    $totalRincian = 0;

                    $idsJenisPembayaran = collect($idJenisPembayaran)->unique()->values()->all();
                    $refJenisPembayaran = RefJenisPembayaran::whereIn('id', $idsJenisPembayaran)
                                                                ->get()
                                                                ->keyBy('id'); // Mengindeks koleksi berdasarkan ID untuk akses cepat
                                                                
                    foreach($jenisPembayaran as $key=>$value){
                        $nominal = $refJenisPembayaran->get($idJenisPembayaran[$key])->harga ?? 0;
                        $teksJenisPembayaran = $refJenisPembayaran->get($idJenisPembayaran[$key])->jenis ?? "Jenis Pembayaran Tidak Ditemukan";
                        
                        if($idJenisPembayaran[$key] == 3){
                            if($value >= $nominal)
                            {
                                $dataSaku = [
                                    'dari' => 1,
                                    'jumlah' => $value,
                                    'tanggal' => $tanggalBayar,
                                    'no_induk' => $noInduk,
                                    'id_pembayaran' => $id,
                                    'status_pembayaran' => 0
                                ];
                                $query2 = SakuMasuk::insert($dataSaku);
                            }else{
                                return response()->json([
                                    'status'    => 422,
                                    'message'   => 'Nominal rincian pembayaran ' . $teksJenisPembayaran . ' tidak boleh kurang dari Rp' . number_format($nominal, 0, ',', '.') . ',00.',
                                ], 422);
                            }
                        }

                        if($value != 0 && !empty($value)){
                            if($value >= $nominal){
                                $dataDetail = [
                                    'id_pembayaran'=>$id,
                                    'id_jenis_pembayaran' => $idJenisPembayaran[$key],
                                    'nominal' => $value,
                                ];
                                $query = detailPembayaran::insert($dataDetail);
                                $totalRincian += $value;
                            }else{
                                return response()->json([
                                    'status'    => 422,
                                    'message'   => 'Nominal rincian pembayaran ' . $teksJenisPembayaran . ' tidak boleh kurang dari Rp' . number_format($nominal, 0, ',', '.') . ',00.',
                                ], 422);
                            }
                        }
                    }

                    if($totalRincian != $jumlah)
                    {
                        return response()->json([
                            'status'    => 422,
                            'message'   => 'Total pembayaran dan rincian pembayaran tidak sama.',
                        ], 422);
                    }

                    $dataSantri = DetailSantri::where('no_induk', $noInduk)->first();
$message = '[     dari mobile PPATQ-RF ku   ]

Dapatkan Aplikasi Mobile Wali Santri
https://new.ppatq-rf.sch.id/app-wali-santri

Yth. Bp/Ibu *' . $atasNama . '*, Wali Santri *' . $dataSantri->nama . '* kelas *' . strtoupper($dataSantri->kelas) . '* telah melaporkan pembayaran bulan *' .   $this->getNamaBulan($periode) . '* 
Rp. ' . number_format($jumlah, 0, ',', '.') . ' rincian sbb : 
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
Kami ucapkan banyak terima kasih kepada (Bp/Ibu) ' . $atasNama . ', salam kami kepada keluarga.

Semoga pekerjaan dan usahanya diberikan kelancaran dan menghasilkan Rizqi yang banyak dan berkah, aamiin.
';

                
                    if($insertPembayaran){

                        try {
                            $data = [
                                'id_pembayaran' => $id,
                                'nama' => $atasNama,
                                'no_wa' => $noWa,
                                'pesan' => $message,
                                'tanggal_kirim' => now(),
                            ];

                            $hasil = SendWA::create($data);
                            $sendWa = Helpers_wa::send_wa($data);

                            $responseDecoded = json_decode($sendWa, true);

                            DB::commit();
                            return response()->json([
                                'status' => 201,
                                'message' => 'Data berhasil dimasukkan',
                                'data' => $responseDecoded
                            ], 201);
                        } catch (\Exception $e) {
                            return response()->json([
                                'status' => 500,
                                'message' => 'Terjadi kesalahan saat mengirim pesan WA',
                                'error' => $e->getMessage() // Boleh di-nonaktifkan di production untuk alasan keamanan
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
                    'message'   => "Bukti pembayaran tidak valid"
                ], 402);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan saat memproses permintaan',
                'error' => $e->getMessage()
            ], 500);
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
