<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(){
        try{
            $queryGaleri = DB::table('galeri')
            ->select(
                'nama',
                'deskripsi',
                'foto',
                'published',
            )
            ->inRandomOrder()
            ->get();

            $queryFasilitas = DB::table('fasilitas')
            ->select(
                'nama',
                'deskripsi',
                'foto',
                'published',
            )
            ->inRandomOrder()
            ->get();

            $data = [
                'galeri' => $queryGaleri,
                'fasilitas' => $queryFasilitas,
            ];

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
}
