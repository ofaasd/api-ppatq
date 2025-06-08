<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginWaliSantriRequest;
use App\Http\Resources\WaliSantriResource;
use App\Models\DetailSantriTahfidz;
use App\Models\Kesehatan;
use App\Models\RawatInap;
use App\Models\RefSiswa;
use App\Models\SantriDetail;
use App\Models\TbPemeriksaan;
use Illuminate\Http\Request;
use Carbon\Carbon;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class WaliSantriController extends Controller
{
    public function login(LoginWaliSantriRequest $request): JsonResponse
    {
        $reqData = $request->validated();

        $tanggalLahir = Carbon::parse($reqData['tanggalLahir'])->format('Y-m-d');

        $siswa = RefSiswa::where([
            'ref_siswa.no_induk'=>$reqData['no_induk'], 
            'ref_siswa.kode'=>$reqData['kode'],
            'santri_detail.tanggal_lahir'=>$tanggalLahir
        ])
        ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'ref_siswa.no_induk');

        if($siswa->count() > 0){
            $hasil = $siswa->first();
            // $token = Str::random(40);
            $update = RefSiswa::find($hasil->id);
            // $update->token = $token;
            // $update->save();
            // $update->refresh();
            return (new WaliSantriResource($update))->response()->setStatusCode(201);
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
                    'kode_juz.kode',
                    'kode_juz.nama as nmJuz'
                ])
                ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
                ->where('detail_santri_tahfidz.no_induk', $noInduk)
                ->whereNotNull('kode_juz.nama')
                ->where('kode_juz.nama', '!=', '')
                ->orderBy('detail_santri_tahfidz.tanggal', 'desc')
                ->get();

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
}   
