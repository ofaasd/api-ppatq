<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Models\EmployeeNew;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use App\Models\TbPemeriksaan;
use App\Models\RefTahunAjaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Http\Resources\MurrobyResource;

use App\Http\Helpers\Helpers_wa;

use App\Http\Requests\LoginMurrobyRequest;
use App\Models\RefKelas;
use Illuminate\Http\Exceptions\HttpResponseException;

class MurrobyController extends Controller
{
    public function login(LoginMurrobyRequest $request): JsonResponse
    {
        $data = $request->validated();

        $response = Http::asForm()->post(config('services.passport_user.login_endpoint'), [
            'grant_type' => 'password',
            'client_id'     => config('services.passport_user.client_id'),
            'client_secret' => config('services.passport_user.client_secret'),
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => '',
        ]);

        // if ($response->failed()) {
        //     throw new HttpResponseException(response([
        //         "errors" => [
        //             'Verifikasi' => [
        //                 $response->json() // SALAH! Ini bukan bentuk response yang valid
        //             ]
        //         ]
        //     ], 400));
        // }

        if ($response->failed()) {
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Login gagal. Harap pastikan email dan password benar.'
                    ]
                ]
            ], 400));
        }

        // Token berhasil dibuat
        $tokenData = $response->json();

        // Ambil user
        $user = User::where('email', $data['email'])->first();

        // Ambil data pegawai seperti sebelumnya
        $pegawai = EmployeeNew::where('employee_new.id', $user->pegawai_id)
            ->select([
                'users.id AS idUser',
                'employee_new.nama',
                'employee_new.photo',
                'employee_new.jenis_kelamin',
                'employee_new.no_hp',
            ])
            ->leftJoin('users', 'users.pegawai_id', '=', 'employee_new.id')
            ->first();
        // Tambahkan token ke resource
        $pegawai->access_token = $tokenData['access_token'];
        $pegawai->expires_in = $tokenData['expires_in'];
        $pegawai->isWaliKelas = RefKelas::where('employee_id', $user->pegawai_id)->exists();

        $nowFormatted = Carbon::now()->translatedFormat('l d F Y, H:i');

$teksJenisKelamin = $pegawai->jenis_kelamin == 'Laki-laki' ? 'Ustad' : 'Ustadzah';

$message = "🎉 Selamat datang

{$teksJenisKelamin} {$pegawai->nama}. Anda telah melakukan log in pada Aplikasi Mobile

{$nowFormatted}

Informasi lain juga dapat diakses melalui www.ppatq-rf.sch.id
";

            // kirim wa
            $data = [
                'no_wa' => $pegawai->no_hp,
                'pesan' => $message
            ];

            $sendWa = Helpers_wa::send_wa($data);

        activity()
        ->useLog('autentikasi')
        ->event('POST')
        ->causedBy($user)
        ->withProperties([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'who' => 'ustad',
        ])
        ->log('Login');

        // Return resource
        return (new MurrobyResource($pegawai))->response()->setStatusCode(200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $request->user()->token()->revoke();

        activity()
        ->useLog('autentikasi')
        ->event('POST')
        ->causedBy($user)
        ->withProperties([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'who' => 'ustad',
        ])
        ->log('Logout');

        return response()->json([
            'status'    => 200,
            'message' => 'Logout berhasil',
        ], 200);
    }
    
    public function index($idUser)
    {
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

        $listSantri = SantriDetail::select([
            'santri_detail.no_induk AS noIndukSantri',
            'santri_detail.nama AS namaSantri',
            'santri_detail.kelas AS kelasSantri',
            'santri_detail.no_hp AS noHpSantri',
            'santri_detail.photo AS fotoSantri',
            DB::raw("CONCAT_WS(', ', santri_detail.alamat, santri_detail.kelurahan, santri_detail.kecamatan, cities.city_name) AS alamatLengkap"),
        ])
        ->leftJoin('cities', 'cities.city_id', '=', 'santri_detail.kabkota')
        ->where('kamar_id', $dataUser->idKamar)
        ->where('santri_detail.status', 0)
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

            $dataSantri = SantriDetail::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama',
                'tp.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tp.tinggi_badan AS tinggiBadan',
                'tp.berat_badan AS beratBadan',
                'tp.lingkar_pinggul AS lingkarPinggul',
                'tp.lingkar_dada AS lingkarDada',
                'tp.kondisi_gigi AS kondisiGigi',
            ])
            ->leftJoinSub($sub, 'latest', function ($join) {
                $join->on('latest.no_induk', '=', 'santri_detail.no_induk');
            })
            ->leftJoin('tb_pemeriksaan as tp', function ($join) {
                $join->on('tp.no_induk', '=', 'santri_detail.no_induk')
                    ->on('tp.id', '=', 'latest.latest_id')
                    ->whereNull('tp.deleted_at');
            })
            ->where('santri_detail.kamar_id', $dataUser->idKamar)
            ->where('santri_detail.status', 0)
            ->get()
            ->map(function ($item) {
                    $item->tanggalPemeriksaanFormatted = date('Y-m-d', $item->tanggalPemeriksaan);
                return $item;
            });

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
            ->where('santri_detail.status', 0)
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
            ->orderBy('tb_pemeriksaan.tanggal_pemeriksaan', 'desc')
            ->get()
            ->map(function ($item) {
                    $item->tanggalPemeriksaanFormatted = date('Y-m-d', $item->tanggalPemeriksaan);
                return $item;
            });
            
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
}
