<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\SantriDetail;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function store(Request $request)
    {
        try{
            $latestKeluhan = Keluhan::orderBy('id', 'desc')->first();
            $dataSantri = SantriDetail::where('no_induk', $request->namaSantri)->first();

            if(!$dataSantri){
                return response()->json([
                    "status"  => 404,
                    "message" => "Santri tidak ditemukan.",
                ], 404);
            }

            if(!$dataSantri->nama_lengkap_ayah){
                return response()->json([
                    "status"  => 404,
                    "message" => "Nama ayah tidak ditemukan, Mohon segera melengkapi data.",
                ], 404);
            }

            if(!$dataSantri->nama_lengkap_ibu){
                return response()->json([
                    "status"  => 404,
                    "message" => "Nama ibu tidak ditemukan, Mohon segera melengkapi data.",
                ], 404);
            }
            $newId = $latestKeluhan ? $latestKeluhan->id + 1 : 1; // Jika tidak ada data, mulai dengan id = 1
            $save = Keluhan::create([
                'id' => $newId,
                'nama_pelapor' => $request->namaPelapor,
                'email' => $request->email,
                'no_hp' => $request->noHp,
                'id_santri' => $request->namaSantri,
                'nama_wali_santri' => $dataSantri->nama_lengkap_ayah ?? $dataSantri->nama_lengkap_ibu,
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
}
