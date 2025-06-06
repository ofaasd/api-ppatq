<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\LoginMurrobyRequest;
use App\Http\Resources\MurrobyResource;
use App\Models\EmployeeNew;
use App\Models\RefKamar;
use App\Models\RefTahunAjaran;
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
            return (new MurrobyResource($pegawai))->response()->setStatusCode(201);
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
                'employee_new.nama AS namaMurroby',
                'employee_new.photo AS fotoMurroby',
                'ref_kamar.code AS kodeKamar'
            ])
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('users.id', $idUser)
            ->first();

        if(!$dataUser)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data murroby tidak ditemukan',
            ], 404);
        }

        $listSantri = RefKamar::select([
                'santri_detail.no_induk AS noIndukSantri',
                'santri_detail.nama AS namaSantri',
                'santri_detail.kelas AS kelasSantri',
            ])
            ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
            ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->get();

        if(!$listSantri)
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
}
