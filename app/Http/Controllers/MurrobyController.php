<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MurrobyController extends Controller
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
                'santri_detail.kelas AS kelasSantri',
            ])
            ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
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
}
