<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\LoginMurrobyRequest;
use App\Http\Resources\MurrobyResource;
use App\Models\EmployeeNew;
use App\Models\RefKamar;
use App\Models\RefTahunAjaran;
use App\Models\SantriDetail;
use App\Models\SantriKamar;
use App\Models\TbPemeriksaan;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Support\Facades\Hash;

class MurrobyController extends Controller
{
    public function login(LoginMurrobyRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Ambil user berdasarkan email
        $user = User::where('email', $data['email'])->first();

        // Cek jika user ditemukan dan password cocok
        if ($user && Hash::check($data['password'], $user->password)) {
            // Ambil data pegawai terkait
            $pegawai = EmployeeNew::where('employee_new.id', $user->pegawai_id)
                ->select([
                    'users.id AS idUser',
                    'employee_new.nama',
                    'employee_new.photo',
                ])
                ->leftJoin('users', 'users.pegawai_id', '=', 'employee_new.id')
                ->first();

            // Return resource dengan data pegawai
            return (new MurrobyResource($pegawai))->response()->setStatusCode(200);
        } else {
            // Jika gagal
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Login gagal. Harap pastikan data yang dimasukkan sudah benar'
                    ]
                ]
            ], 400));
        }
    }
    
    public function index($idUser)
    {
        $ta = RefTahunAjaran::where('is_aktif', 1)->first();
        $dataUser = User::select([
                'employee_new.id AS idPegawai',
                'employee_new.nama AS namaMurroby',
                'employee_new.photo AS fotoMurroby',
                'employee_new.alamat AS alamatMurroby',
                // 'ref_kamar.code AS kodeKamar',
                'ref_kamar.id AS idKamar'
            ])
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('users.id', $idUser)
            ->first();
        if ($dataUser && $dataUser->kodeKamar) {
            $dataUser->kodeKamar = strtoupper($dataUser->kodeKamar);
        }

        if(!$dataUser)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data murroby tidak ditemukan',
            ], 404);
        }

        // $listSantri = RefKamar::select([
        //         'santri_detail.no_induk AS noIndukSantri',
        //         'santri_detail.nama AS namaSantri',
        //         'santri_detail.kelas AS kelasSantri',
        //         'santri_detail.no_hp AS noHpSantri',
        //         'santri_detail.photo AS fotoSantri',
        //         DB::raw("CONCAT_WS(', ', santri_detail.alamat, santri_detail.kelurahan, santri_detail.kecamatan, kota_kab_tbl.nama_kota_kab) AS alamatLengkap"),
        //     ])
        //     ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
        //     ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
        //     ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id_kota_kab', '=', 'santri_detail.kabkota')
        //     ->where('santri_kamar.tahun_ajaran_id', $ta->id)
        //     ->where('santri_kamar.status', 1)
        //     ->where('ref_kamar.employee_id', $dataUser->idPegawai)
        //     ->get();

        $listSantri = SantriDetail::select([
            'santri_detail.no_induk AS noIndukSantri',
            'santri_detail.nama AS namaSantri',
            'santri_detail.kelas AS kelasSantri',
            'santri_detail.no_hp AS noHpSantri',
            'santri_detail.photo AS fotoSantri',
            DB::raw("CONCAT_WS(', ', santri_detail.alamat, santri_detail.kelurahan, santri_detail.kecamatan, kota_kab_tbl.nama_kota_kab) AS alamatLengkap"),
        ])
        ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id_kota_kab', '=', 'santri_detail.kabkota')
        ->where('kamar_id', $dataUser->idKamar)
        ->get();

        if($listSantri->isEmpty())
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data santri tidak ditemukan',
            ], 404);
        }

        $data = [
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  [
                'dataUser' => $dataUser,
                'listSantri'    =>  $listSantri
            ]
        ];

        return response()->json($data, 200);
    }

    public function pemeriksaan($idUser)
    {
        try{
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $dataUser = User::select([
                    'employee_new.nama AS namaMurroby',
                    'employee_new.photo AS fotoMurroby',
                    'ref_kamar.code AS kodeKamar',
                    'ref_kamar.id AS idKamar'
                ])
                ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
                ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
                ->where('users.id', $idUser)
                ->first();

            $sub = DB::table('tb_pemeriksaan as tp1')
                ->select('tp1.no_induk', DB::raw('MAX(tp1.id) as latest_id'))
                ->groupBy('tp1.no_induk');

            $dataSantri = SantriKamar::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama',
                'tp.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tp.tinggi_badan AS tinggiBadan',
                'tp.berat_badan AS beratBadan',
                'tp.lingkar_pinggul AS lingkarPinggul',
                'tp.lingkar_dada AS lingkarDada',
                'tp.kondisi_gigi AS kondisiGigi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
            ->leftJoinSub($sub, 'latest', function ($join) {
                $join->on('latest.no_induk', '=', 'santri_detail.no_induk');
            })
            ->leftJoin('tb_pemeriksaan as tp', function ($join) {
                $join->on('tp.no_induk', '=', 'santri_detail.no_induk')
                    ->on('tp.id', '=', 'latest.latest_id')
                    ->whereNull('tp.deleted_at');
            })
            ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->where('santri_kamar.status', 1)
            ->where('santri_kamar.kamar_id', $dataUser->idKamar)
            ->get();

            $data = [
                'dataUser' => $dataUser,
                'dataSantri' => $dataSantri,
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

    public function detailPemeriksaan($noInduk)
    {
        try{
            $dataSantri = SantriDetail::select([
                'santri_detail.nama',
                'santri_detail.no_induk AS noInduk',
            ])
            ->where('no_induk', $noInduk)
            ->first();

            $dataPemeriksaan = TbPemeriksaan::select([
                'tb_pemeriksaan.id',
                'tb_pemeriksaan.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tb_pemeriksaan.tinggi_badan AS tinggiBadan',
                'tb_pemeriksaan.berat_badan AS beratBadan',
                'tb_pemeriksaan.lingkar_pinggul AS lingkarPinggul',
                'tb_pemeriksaan.lingkar_dada AS lingkarDada',
                'tb_pemeriksaan.kondisi_gigi AS kondisiGigi',
            ])
            ->where('no_induk', $noInduk)
            ->orderBy('created_at', 'desc')
            ->get();
            
            $data = [
                'dataSantri'    => $dataSantri,
                'dataPemeriksaan'   => $dataPemeriksaan
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

    public function storePemeriksaan(Request $request)
    {
        try{
            $data = TbPemeriksaan::create([
                'no_induk' => $request->noInduk,
                'tanggal_pemeriksaan' => strtotime($request->tanggalPemeriksaan),
                'tinggi_badan' => $request->tinggiBadan,
                'berat_badan' => $request->beratBadan,
                'lingkar_pinggul' => $request->lingkarPinggul,
                'lingkar_dada' => $request->lingkarDada,
                'kondisi_gigi' => $request->kondisiGigi,
            ]);

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menyimpan data pemeriksaan santri.",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function editPemeriksaan($id)
    {
        try{
            $data = TbPemeriksaan::where('id', $id)->first();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"  => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function updatePemeriksaan(Request $request, $id)
    {
        try{
            $data = TbPemeriksaan::where('id', $id)->first();
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal_pemeriksaan' => strtotime($request->tanggalPemeriksaan),
                'tinggi_badan' => $request->tinggiBadan,
                'berat_badan' => $request->beratBadan,
                'lingkar_pinggul' => $request->lingkarPinggul,
                'lingkar_dada' => $request->lingkarDada,
                'kondisi_gigi' => $request->kondisiGigi,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data pemeriksaan santri",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function deletePemeriksaan($id)
    {
        try{
            $data = TbPemeriksaan::where('id', $id)->first();
            $data->delete();
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
