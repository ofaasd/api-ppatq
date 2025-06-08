<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffPengasuhController extends Controller
{
    public function getUstadz(Request $request)
    {
        try{
            $search = $request->input('search');

            $query = DB::table("employee_new")
            ->select("employee_new.nama", "employee_new.alhafidz", "employee_new.photo", "employee_new.jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->whereIn("employee_new.jabatan_new", [7, 8, 14])
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%');
                });
            }
    
            $data = $query->get();

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

    public function getMurroby(Request $request)
    {
        try{
            $search = $request->input('search');

            $query = DB::table("employee_new")
            ->select("employee_new.nama", "employee_new.alhafidz", "employee_new.photo", "employee_new.jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->where("employee_new.jabatan_new", 12)
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%');
                });
            }
    
            $data = $query->get();

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

    public function getStaff(Request $request)
    {
        try{
            $search = $request->input('search');

            $query = DB::table("employee_new")
            ->select("employee_new.nama", "employee_new.alhafidz", "employee_new.photo", "employee_new.jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->whereIn("employee_new.jabatan_new", [9, 10, 11, 13, 15])
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%');
                });
            }
    
            $data = $query->get();

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
