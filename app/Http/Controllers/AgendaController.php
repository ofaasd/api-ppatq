<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function index(Request $request){
        try{
            $perPage = $request->input('per_page', 5);

            $data = DB::table('agenda')
                        ->select('judul', 'tanggal_mulai', 'tanggal_selesai')
                        ->orderBy('tanggal_mulai', 'desc')
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
