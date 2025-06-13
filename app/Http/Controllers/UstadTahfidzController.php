<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tahfidz;

use App\Models\EmployeeNew;
use Illuminate\Http\Request;
use App\Models\RefTahunAjaran;
use App\Models\DetailSantriTahfidz;
use App\Models\SantriDetail;

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

            $data = [
                'idTahfidz' => $tahfidz->id,
                'data' => $detail,
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
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $tanggal = $request->tanggal;
            $bulan = date('m', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $cekData = DetailSantriTahfidz::where('id_tahfidz', $request->idTahfidz)
                ->where('no_induk', $request->noInduk)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->first();
            if (!empty($cekData->id)) {
                $id = $cekData->id;
            }

            $data = DetailSantriTahfidz::updateOrCreate(
                ['id' => $id],
                [
                    'id_tahfidz' => $request->idTahfidz,
                    'no_induk' => $request->noInduk,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'tanggal' => $tanggal,
                    'id_tahun_ajaran' => $ta->id,
                    'kode_juz_surah' => $request->kodeJuzSurah,
                ]
            );

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menambahkan tahfidz",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }

    }

    public function listSantri(int $idUser)
    {
        try{
            $user = User::where('id', $idUser)->first();
            $ustadTahfidz = EmployeeNew::where('id', $user->pegawai_id)->first();
            $tahfidz = Tahfidz::where('employee_id', $user->pegawai_id)->first();

            $listSantri = SantriDetail::select([
                    'santri_detail.no_induk',
                    'santri_detail.nama',
                    'santri_detail.kelas',
                ])
                ->where('tahfidz_id', $tahfidz->id)
                ->get();

            $data = [
                'namaUstad' => $ustadTahfidz->nama,
                'kodeTahfidz' => $tahfidz->code,
                'kelas' => $tahfidz->name,
                'listSantri' => $listSantri
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
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function detailSantri(int $noInduk)
    {
        try{
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $getData = DetailSantriTahfidz::select([
                    'detail_santri_tahfidz.bulan',
                    'detail_santri_tahfidz.tahun',
                    'kode_juz.nama AS juz',
                ])
                ->leftJoin('kode_juz', 'kode_juz.id', '=', 'detail_santri_tahfidz.kode_juz_surah')
                ->where('detail_santri_tahfidz.id_tahun_ajaran', $ta->id)
                ->where('detail_santri_tahfidz.no_induk', $noInduk)
                ->orderBy('detail_santri_tahfidz.created_at', 'desc')
                ->get();
            $getProfil = SantriDetail::where('no_induk', $noInduk)->first();

            $data = [
                'namaSantri'    => $getProfil->nama,
                'data'  => $getData
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
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function edit(int $id)
    {
        try{
            $data = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.id',
                'detail_santri_tahfidz.bulan',
                'santri_detail.nama AS namaSantri',
                'kode_juz.nama AS juz',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'detail_santri_tahfidz.no_induk')
            ->leftJoin('kode_juz', 'kode_juz.id', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('detail_santri_tahfidz.id', $id)
            ->first();
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
            $tanggal = $request->tanggal;
            $bulan = date('m', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $data = DetailSantriTahfidz::where('id', $id)->first();
            $data->update([
                'id_tahfidz' => $request->idTahfidz,
                'no_induk' => $request->noInduk,
                'bulan' => $request->$bulan,
                'tahun' => $request->$tahun,
                'tanggal' => $request->tanggal,
                'id_tahun_ajaran' => $ta->id,
                'kode_juz_surah' => $request->kodeJuzSurah,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data.",
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

    public function delete(string $id)
    {
        try{
            $data = DetailSantriTahfidz::where('id', $id)->delete();
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil menghapus data",
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
