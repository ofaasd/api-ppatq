<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbPemeriksaan;

class KesehatanSantriController extends Controller
{
    public function index()
    {
        try {
            $data = TbPemeriksaan::select(
                "tb_pemeriksaan.no_induk",
                "tanggal_pemeriksaan",
                "tinggi_badan",
                "berat_badan",
                "lingkar_pinggul",
                "lingkar_dada",
                "kondisi_gigi",
                "santri_detail.nama AS nama_santri"
            )
            ->leftJoin("santri_detail", "santri_detail.no_induk", "=", "tb_pemeriksaan.no_induk")
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan saat mengambil data. Hubungi Faiz ganteng",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function getNoInduk($noInduk = null)
    {
        try {
            $data = TbPemeriksaan::select(
                        "tb_pemeriksaan.no_induk",
                        "tanggal_pemeriksaan",
                        "tinggi_badan",
                        "berat_badan",
                        "lingkar_pinggul",
                        "lingkar_dada",
                        "kondisi_gigi",
                        "santri_detail.nama AS nama_santri"
                    )
                    ->leftJoin("santri_detail", "santri_detail.no_induk", "=", "tb_pemeriksaan.no_induk")
                    ->where('tb_pemeriksaan.no_induk', $noInduk)
                    ->first();
                    
            if (!$data) {
                return response()->json([
                    "status"    => 404,
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"    => 500,
                "message" => "Terjadi kesalahan saat mengambil data. Hubungi Faiz ganteng",
                "error"   => $e->getMessage() // Hapus pada production untuk alasan keamanan
            ], 500);
        }
    }
}
