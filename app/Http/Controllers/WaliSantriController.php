<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RefSiswa;
use App\Models\Kesehatan;
use App\Models\RawatInap;
use App\Models\SakuMasuk;
use App\Models\pembayaran;
use App\Models\SakuKeluar;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use App\Models\TbPemeriksaan;
use Illuminate\Http\JsonResponse;
use App\Models\RefJenisPembayaran;
use Illuminate\Support\Facades\DB;
use App\Models\DetailSantriTahfidz;


use App\Http\Resources\WaliSantriResource;
use App\Http\Requests\LoginWaliSantriRequest;
use App\Models\detailPembayaran;
use App\Models\Tunggakan;
use Illuminate\Http\Exceptions\HttpResponseException;

class WaliSantriController extends Controller
{
    public function login(LoginWaliSantriRequest $request): JsonResponse
    {
        $reqData = $request->validated();

        $tanggalLahir = Carbon::parse($reqData['tanggalLahir'])->format('Y-m-d');

        $siswa = RefSiswa::where([
            'ref_siswa.no_induk'=>$reqData['noInduk'], 
            'ref_siswa.kode'=>$reqData['kode'],
            'santri_detail.tanggal_lahir'=>$tanggalLahir
        ])
        ->select([
            'santri_detail.no_induk',
            'ref_siswa.kode',
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
            'ref_tahfidz.name AS kelasTahfidz',
            'ref_kamar.name AS kamar',
            'murroby.nama AS namaMurroby',
            'murroby.photo AS fotoMurroby',
            'tahfidz.nama AS namaTahfidz',
            'tahfidz.photo AS fotoTahfidz',
            'tb_uang_saku.jumlah AS saldo',
        ])
        ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'ref_siswa.no_induk')
        ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id_kota_kab', '=', 'santri_detail.kabkota')
        ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
        ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
        ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'ref_siswa.no_induk')
        ->leftJoin('employee_new AS murroby', 'murroby.id', '=', 'ref_kamar.employee_id')
        ->leftJoin('employee_new AS tahfidz', 'tahfidz.id', '=', 'ref_tahfidz.employee_id');   

        if($siswa->count() > 0){
            $hasil = $siswa->first();
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
            }
            $hasil->saku_masuk = $sakuMasuk;
            $hasil->saku_keluar = $sakuKeluar;
            // $token = Str::random(40);
            // $update = RefSiswa::find($hasil->id);
            // $update->token = $token;
            // $update->save();
            // $update->refresh();
            return (new WaliSantriResource($hasil))->response()->setStatusCode(201);
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

    public function ketahfidzan($noInduk)
    {
        try{
            $ketahfidzan = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.tanggal',
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
