<?php

namespace App\Http\Controllers;

use App\Models\KodeJuz;
use App\Models\RefBank;
use App\Models\RefKelas;
use App\Models\RefKategori;
use App\Models\SantriDetail;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function kodeJuz()
    {
        try{
            $data = KodeJuz::select('kode', 'nama')->get();

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
            $data = SantriDetail::select([
                    'santri_detail.nama',
                    'santri_detail.no_induk'
                ])
                ->when($search, function ($query, $search) {
                    $query->where(function($q) use ($search) {
                        $q->where('santri_detail.nama', 'like', '%' . $search . '%')
                        ->orWhere('santri_detail.no_induk', 'like', '%' . $search . '%');
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

    public function bank()
    {
        try{
            $data = RefBank::select([
                'ref_bank.id',
                'ref_bank.nama',
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

    public function bulan()
    {
        try {
            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $bulan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error" => $e->getMessage() // Hanya aktifkan saat debugging
            ]);
        }

    }
}
