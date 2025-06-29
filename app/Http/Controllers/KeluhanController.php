<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function store(Request $request)
    {
        try{
            $latestKeluhan = Keluhan::orderBy('id', 'desc')->first();
            $newId = $latestKeluhan ? $latestKeluhan->id + 1 : 1; // Jika tidak ada data, mulai dengan id = 1
            $save = Keluhan::create([
                'id' => $newId,
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
                "status"  => 201,
                "message" => "Berhasil mengirim keluhan/aduan.",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
}
