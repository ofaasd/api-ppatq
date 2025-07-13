<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesantrianController extends Controller
{
    public function index()
    {
        try{
            $perPage = 4;
            
            $queryCalonSantri = DB::table('psb_peserta_online')
            ->select(
                'psb_peserta_online.nik',
                'psb_peserta_online.nama',
                'psb_peserta_online.jenis_kelamin',
                'psb_gelombang.nama_gel AS namaGelombang'
            )
            ->leftJoin('psb_gelombang', 'psb_peserta_online.gelombang_id', '=', 'psb_gelombang.id')
            ->distinct()
            ->inRandomOrder();

            $santriCalon = $queryCalonSantri->paginate($perPage);

            $querySantriAktif = DB::table('santri_detail')
            ->select(
                'santri_detail.nama', 
                'santri_detail.photo', 
                'santri_detail.kelas', 
                'santri_detail.kecamatan', 
                'ref_kamar.employee_id AS kamar_employee_id',
                'ref_kelas.employee_id AS kelas_employee_id',
                'guru_murroby.nama AS guru_murroby',  
                'wali_kelas.nama AS wali_kelas'  
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->inRandomOrder();

            $santriAktif = $querySantriAktif->paginate($perPage);

            $queryAlumni = DB::table('tb_alumni_santri_detail AS tbAlumni')
            ->select(
                'tbAlumni.*',
                DB::raw("CONCAT(SUBSTRING(tbAlumni.no_hp, 1, 8), '****') AS no_hp"), 
                'ref_kamar.employee_id AS kamar_employee_id',
                'ref_kelas.employee_id AS kelas_employee_id',
                'guru_murroby.nama AS guru_murroby',  
                'wali_kelas.nama AS wali_kelas',
                'tb_alumni.angkatan as angkatan'
            )
            ->leftJoin('tb_alumni', 'tbAlumni.no_induk', '=', 'tb_alumni.no_induk')
            ->leftJoin('ref_kamar', 'tbAlumni.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'tbAlumni.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->inRandomOrder();

            $santriAlumni = $queryAlumni->paginate($perPage);

            $data = [
                "santriAktif"  => $santriAktif,
                "santriAlumni"  => $santriAlumni,
                "santriCalon"  => $santriCalon,
            ];

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
