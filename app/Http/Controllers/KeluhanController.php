<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function store(Request $request)
    {
        try{
            $save = Keluhan::create([
                'nama_pelapor' => $request->namaPelapor,
                'email' => $request->email,
                'no_hp' => $request->noHp,
                'id_santri' => $request->namaSantri,
                'nama_wali_santri' => $request->namaWaliSantri,
                'id_kategori' => $request->kategori,
                'masukan' => $request->masukan,
                'saran' => $request->saran,
                'rating' => $request->rating,
                'jenis' => $request->jenis,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengirim keluhan/aduan",
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
