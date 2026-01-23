<?php

namespace App\Http\Controllers;

use App\Models\RefKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class KelasKamarController extends Controller
{
    public function index()
    {
        try{
            $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

            $queryKelas = DB::table('ref_kelas')
            ->select('employee_new.nama AS nama_guru', 'ref_kelas.id AS id_kelas', 'ref_kelas.name')
            ->leftJoin('employee_new', 'ref_kelas.employee_id','=','employee_new.id')
            ->get()
            ->map(function ($item) {
                $item->id_kelas = Crypt::encryptString($item->id_kelas . "ppatq");
                return $item;
            });

            $queryKamar = DB::table('ref_kamar')
            ->select(
                'ref_kamar.id',
                'employee_new.nama AS guru_murroby'
            )
            ->orderByRaw("CAST(SUBSTRING_INDEX(code, 'a', 1) AS UNSIGNED) ASC, code ASC")
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->whereIn('ref_kamar.id', function ($query) use ($tahunAjaran) {
                $query->select('kamar_id')
                    ->from('santri_kamar');
                    // ->where('tahun_ajaran_id', $tahunAjaran->id);
            })
            ->get()
            ->map(function ($item) {
                $item->id = Crypt::encryptString($item->id . "ppatq");
                return $item;
            });

            $data = [
                'dataKelas'  => $queryKelas,
                'dataKamar'  => $queryKamar
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

    public function showKelas($idEnkripsi)
    {
        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
            $id = str_replace("ppatq", "", $idAsli);

            $kelasData = DB::table('ref_kelas')
            ->leftJoin('employee_new', 'ref_kelas.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id)
            ->select(
                'employee_new.nama AS wali_kelas_nama',
                'employee_new.photo AS wali_kelas_photo',
                'ref_kelas.name AS nama_kelas'
            )
            ->first();

            if (!$kelasData) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            $querySantriDetail = DB::table('santri_detail')
            ->select(
                'santri_detail.no_induk',
                'santri_detail.nama', 
                'santri_detail.photo AS fotoSantri', 
                'santri_detail.kelas', 
                'santri_detail.kecamatan', 
                'ref_kamar.employee_id AS kamar_employee_id', 
                'ref_kelas.employee_id AS kelas_employee_id', 
                'ref_kelas.code AS nama_kelas', 
                'employee_new.nama AS guru_murroby',
                'ref_tahfidz.name AS kelasTahfidz'
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
            ->leftJoin('santri_tahfidz', 'santri_detail.id', '=', 'santri_tahfidz.santri_id')
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id)
            ->where('santri_detail.status', 0)
            ->distinct();

            $jmlSantri = $querySantriDetail->count();
            $listSantri = $querySantriDetail->get();

            $data = [
                "kelasData"  => $kelasData,
                "listSantri"  => $listSantri,
                "jmlSantri"  => $jmlSantri,
            ];

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);

        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi exception
            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showKamar($idEnkripsi)
    {

        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
            $id = str_replace("ppatq", "", $idAsli);

            $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

            $dataKamar = DB::table('ref_kamar')
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('ref_kamar.id', '=', $id)
            ->select(
                'employee_new.nama AS nama_murroby',
                'employee_new.photo AS foto_murroby',
                'ref_kamar.name AS nama_kamar'
            )
            ->first();

            if (!$dataKamar) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan",
                ], 404);
            }

            $queryKamar = DB::table('santri_kamar')
            ->select(
                'santri_kamar.*',
                'santri_detail.nama AS namaSantri', 
                'santri_detail.photo AS fotoSantri', 
                'santri_detail.kelas AS kelasSantri', 
                'santri_detail.kecamatan AS asalSantri',
                'ref_kelas.code AS nama_kelas',
                'employee_new.nama AS guru_murroby',
                'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
                'ref_kelas.employee_id AS kelas_employee_id',
                'ref_tahfidz.name AS kelasTahfidz'
                )
            ->leftJoin('santri_detail', 'santri_kamar.santri_id', '=', 'santri_detail.id')
            ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
            ->leftJoin('ref_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('santri_kamar.kamar_id', $id)
            ->where('santri_kamar.status', 1)
            ->where('santri_detail.status', 0)
            // ->where('santri_kamar.tahun_ajaran_id', $tahunAjaran->id)
            ->distinct()
            ;

            $listSantri = $queryKamar->get();

            $jmlSantri = $queryKamar->count();

            $data = [
                "dataKamar"  => $dataKamar,
                "listSantri"  => $listSantri,
                "jmlSantri"  => $jmlSantri,
            ];
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);

        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi exception
            // return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function getKelas()
    {
        try{
            $queryKelas = RefKelas::select([
                'ref_kelas.id',
                'ref_kelas.code',
                'ref_kelas.name',
                'employee_new.nama AS waliKelas'
            ])
            ->leftJoin('employee_new', 'ref_kelas.employee_id','=','employee_new.id')
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $queryKelas
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
