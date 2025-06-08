<?php

namespace App\Http\Controllers;

use App\Models\KodeJuz;

use App\Models\RefKelas;
use App\Models\RefKategori;
use App\Models\RefSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GetDataController extends Controller
{
    public function kodeJuz()
    {
        try{
            $data = KodeJuz::select('id', 'nama')->get();

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

    public function siswa($search = null)
    {
        try {
            $data = RefSiswa::select([
                    'ref_siswa.nama',
                    'ref_siswa.no_induk'
                ])
                ->when($search, function ($query, $search) {
                    $query->where(function($q) use ($search) {
                        $q->where('ref_siswa.nama', 'like', '%' . $search . '%')
                        ->orWhere('ref_siswa.no_induk', 'like', '%' . $search . '%');
                    });
                })
                ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error" => $e->getMessage()
            ], 500);
        }
    }


    public function kelas()
    {
        try{
            $data = RefKelas::select([
                'ref_kelas.code AS kode',
            ])
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

    public function kategoriKeluhan()
    {
        try{
            $data = RefKategori::select([
                'ref_kategori.id',
                'ref_kategori.nama',
            ])
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
