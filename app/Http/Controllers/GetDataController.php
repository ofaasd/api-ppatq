<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KodeJuz;
use App\Models\RefSiswa;


class GetDataController extends Controller
{
    public function kodeJuz()
    {
        try{
            $data = KodeJuz::select('id', 'nama')->get();

            return response()->json([
                    "status"  => 200,
                    "message" => "Berhasil mengambil data",
                    "data"    => $data
                ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan saat mengambil data. Hubungi Faiz ganteng",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function siswa()
    {
        $siswa = RefSiswa::select([
            'ref_siswa.nama',
            'ref_siswa.no_induk'
        ])
        ->get();

        return response()->json([
            "status"  => 200,
            "message" => "Berhasil mengambil data",
            "data"    => $siswa
        ], 200);
    }
}
