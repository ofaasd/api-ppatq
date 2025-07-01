<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    public function index(){
        try{
            $data = DB::table('rekening')
            ->select(
                'rekening.kode_bank AS kodeBank',
                'ref_bank.nama AS namaBank',
                'rekening.no AS noRekening',
                'rekening.atas_nama AS atasNama'
            )
            ->leftJoin('ref_bank', 'ref_bank.kode', '=', 'rekening.kode_bank')
            ->get();

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
