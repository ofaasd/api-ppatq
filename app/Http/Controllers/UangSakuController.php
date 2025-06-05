<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class UangSakuController extends Controller
{
    public function index($idUser)
    {
        $ta = DB::table('ref_tahun_ajaran')->where('is_aktif', 1)->first();
        $dataUser = DB::table('users')
            ->select([
                'employee_new.nama AS namaMurroby',
                'employee_new.photo AS fotoMurroby',
                'ref_kamar.code AS kodeKamar'
            ])
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('users.id', $idUser)
            ->first();

        if(!$dataUser)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data murroby tidak ditemukan',
            ], 404);
        }

        $listSantri = DB::table('ref_kamar')
            ->select([
                'santri_detail.no_induk AS noIndukSantri',
                'santri_detail.nama AS namaSantri',
                'tb_uang_saku.jumlah AS jumlahSaldo',
            ])
            ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
            ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
            ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->get();

        if(!$listSantri)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data santri tidak ditemukan',
            ], 404);
        }

        $data = [
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  [
                'dataUser' => $dataUser,
                'listSantri'    =>  $listSantri
            ]
        ];

        return response()->json($data, 200);
    }

    public function uangMasuk($noInduk)
    {
        $dataSantri = DB::table('santri_detail')
            ->select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama AS namaSantri',
            ])
            ->where('santri_detail.no_induk', $noInduk)
            ->first();

        $dataUangMasuk = DB::table('tb_saku_masuk')
            ->select([
                DB::raw("
                    CASE tb_saku_masuk.dari
                        WHEN 1 THEN 'Pembayaran Walsan'
                        WHEN 2 THEN 'Kunjungan Walsan'
                        WHEN 3 THEN 'Sisa Bulan Kemarin'
                        ELSE 'Tidak Diketahui'
                    END AS uangAsal
                "),
                'tb_saku_masuk.jumlah AS jumlahMasuk',
                'tb_saku_masuk.tanggal AS tanggalTransaksi',
            ])
            ->where('no_induk', $noInduk)
            ->get();
        
        $data = [
            'dataSantri'    =>  $dataSantri,
            'dataUangMasuk'    =>  $dataUangMasuk,
        ];

        if(!$data)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data uang masuk tidak ditemukan',
            ], 404);
        }
        

        return response()->json([
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  $data,
        ], 200);
    }

    public function storeUangMasuk(Request $request){
        $header = $request->header('Authorization');
        if(empty($header)){
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Verifikasi gagal. Header Authorization tidak ditemukan'
                    ]
                ]
            ], 400));
        }else{
            $bearer = explode(" ",$header);
            $pecah = explode("-",$bearer[1]);
            $data['no_induk'] = $pecah[0];
            $data['token'] = $pecah[1];
            $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'token'=>$data['token']]);
            if($siswa->count() > 0){
                $hasil = $siswa->first();
                return (new SiswaResource($hasil))->response()->setStatusCode(201);
            }else{
                throw new HttpResponseException(response([
                    "errors" => [
                        'Verifikasi' => [
                            'Verifikasi gagal. Harap Login kembali'
                        ]
                    ]
                ], 400));
            }
        }

    }

    public function uangKeluar($noInduk)
    {
        $dataSantri = DB::table('santri_detail')
            ->select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama AS namaSantri',
            ])
            ->where('santri_detail.no_induk', $noInduk)
            ->first();

        $dataUangKeluar = DB::table('tb_saku_keluar')
            ->select([
                'tb_saku_keluar.jumlah AS jumlahKeluar',
                'tb_saku_keluar.note AS catatan',
                'tb_saku_keluar.tanggal AS tanggalTransaksi',
                'employee_new.nama AS namaMurroby',
            ])
            ->leftJoin('employee_new', 'employee_new.id', 'tb_saku_keluar.pegawai_id')
            ->where('no_induk', $noInduk)
            ->get();
        
        $data = [
            'dataSantri'    =>  $dataSantri,
            'dataUangKeluar'    =>  $dataUangKeluar,
        ];

        if(!$data)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data uang keluar tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  $data,
        ], 200);
    }
}
