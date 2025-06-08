<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
   public function index(){
        try{
            $data = DB::table('about')
                ->select(
                    'tentang',
                    'visi',
                    'misi',
                    'alamat',
                    'sekolah',
                    'nsm',
                    'npsn',
                    'nara_hubung',
                    )
                ->first();

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
