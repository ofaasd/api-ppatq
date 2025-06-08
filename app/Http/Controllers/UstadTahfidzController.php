<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tahfidz;

use Illuminate\Http\Request;
use App\Models\RefTahunAjaran;
use App\Models\DetailSantriTahfidz;

class UstadTahfidzController extends Controller
{
    public function index($idUser)
    {
        try{
            $user = User::where('id', $idUser)->first();
            $tahfidz = Tahfidz::where('employee_id', $user->pegawai_id)->first();
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $detail = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.id',
                'detail_santri_tahfidz.bulan',
                'santri_detail.nama AS namaSantri',
                'kode_juz.nama AS juz',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'detail_santri_tahfidz.no_induk')
            ->leftJoin('kode_juz', 'kode_juz.id', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('id_tahfidz', $tahfidz->id)
            ->where('detail_santri_tahfidz.id_tahun_ajaran', $ta->id)
            ->orderBy('detail_santri_tahfidz.created_at', 'desc')
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $detail
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        try{
            $data = DetailSantriTahfidz::where('id', $id)->first();
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

    public function update(Request $request, $id)
    {
        try{
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $data = DetailSantriTahfidz::where('id', $id)->first();
            $data->update([
                'id_tahfidz' => $request->idTahfidz,
                'no_induk' => $request->noInduk,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'tanggal' => $request->tanggal,
                'id_tahun_ajaran' => $ta->id,
                'kode_juz_surah' => $request->kodeJuzSurah,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    // public function indexAdmin($idUser)
    // {
    //     try{
    //         $dataUser = User::select([
    //                 'employee_new.id AS idPegawai',
    //                 'employee_new.nama AS namaMurroby',
    //                 'employee_new.photo AS fotoMurroby',
    //                 'ref_kamar.code AS kodeKamar'
    //             ])
    //             ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
    //             ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
    //             ->where('users.id', $idUser)
    //             ->first();

    //         if(!$dataUser)
    //         {
    //             return response()->json([
    //                 'status'   => 404,
    //                 'message'   => 'Data murroby tidak ditemukan',
    //             ], 404);
    //         }

    //         $query = DetailSantriTahfidz::select(
    //             "santri_detail.nama AS nmSantri",
    //             "employee_new.nama AS nmMurroby",
    //             "santri_detail.kelas AS klsSantri",
    //             \DB::raw("MONTH(detail_santri_tahfidz.tanggal) as bulan"),
    //             \DB::raw("MAX(detail_santri_tahfidz.kode_juz_surah) as maxJuzSurah"),
    //             \DB::raw("(SELECT kode_juz.nama 
    //                         FROM kode_juz 
    //                         WHERE kode_juz.kode = MAX(detail_santri_tahfidz.kode_juz_surah) 
    //                         LIMIT 1) AS nmJuz")
    //         )
    //         ->leftJoin("ref_tahfidz", "ref_tahfidz.id", "=", "detail_santri_tahfidz.id_tahfidz")
    //         ->leftJoin("employee_new", "employee_new.id", "=", "ref_tahfidz.employee_id")
    //         ->leftJoin("santri_detail", "santri_detail.no_induk", "=", "detail_santri_tahfidz.no_induk")
    //         ->where("ref_tahfidz.employee_id", $dataUser->idPegawai)
    //         ->groupBy(
    //             \DB::raw("santri_detail.nama"),
    //             \DB::raw("santri_detail.kelas"),
    //             \DB::raw("employee_new.nama"),
    //             \DB::raw("MONTH(detail_santri_tahfidz.tanggal)")
    //         )
    //         ->orderBy("bulan")
    //         ->get();

    //         // Siapkan data pivot dalam format array
    //         $data = [];

    //         foreach ($query as $item) { 
    //             $nama = $item->nmSantri;

    //             if (!isset($data[$nama])) {
    //                 $data[$nama] = [
    //                     'nmSantri' => $nama,
    //                     'nmMurroby' => $item->nmMurroby,
    //                     // 'klsSantri' => $item->klsSantri,
    //                     'bulan' => array_fill(1, 12, '-') // Inisialisasi semua bulan dengan "-"
    //                 ];
    //             }

    //             $data[$nama]['bulan'][$item->bulan] = $item->nmJuz;
    //         }

    //         $data = [
    //             'status'   => 200,
    //             'message'   => 'Berhasil mengambil data',
    //             'data'  =>  $data
    //         ];

    //         return response()->json($data, 200);
    //     }catch (\Exception $e) {
    //         return response()->json([
    //             "status"  => 500,
    //             "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
    //             // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
    //         ], 500);
    //     }
    // }
}
