<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DakwahController extends Controller
{
    public function index(Request $request){
        try{
            $perPage = $request->input('per_page', 5);

            $data = DB::table('dakwah')
                ->select(
                    'judul',
                    'isi_dakwah',
                    'dakwah.created_at'
                    )
                ->leftJoin('users', 'dakwah.user_id', '=', 'users.id')
                ->whereNull('dakwah.deleted_at')
                ->orderBy('dakwah.created_at', 'desc')
                ->paginate($perPage);

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
