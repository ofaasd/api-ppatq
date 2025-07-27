<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BeritaController extends Controller
{
    public function index(Request $request){
        try{
            $perPage = $request->input('per_page', 5);

            $data = DB::table('berita')
                ->select(
                    'judul',
                    'thumbnail',
                    'gambar_dalam',
                    'isi_berita'
                    )
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->whereNull('berita.deleted_at')
                ->orderBy('berita.created_at', 'desc')
                ->paginate($perPage);

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
}
