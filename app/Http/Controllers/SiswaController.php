<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\VerifikasiSiswaRequest;
use App\Http\Requests\LoginSiswaRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\RefSiswa;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function verifikasi_api(Request $request){
        $header = $request->header('Authorization');
        if(empty($header)){
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Verifikasi gagal. Header Authorization tidak ditemukan'
                    ]
                ]
            ], 400));
        }else{
            $bearer = explode(" ",$header);
            $pecah = explode("-",$bearer[1]);
            $data['no_induk'] = $pecah[0];
            $data['token'] = $pecah[1];
            $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'token'=>$data['token']]);
            if($siswa->count() > 0){
                $hasil = $siswa->first();
                return (new SiswaResource($hasil))->response()->setStatusCode(201);
            }else{
                throw new HttpResponseException(response([
                    "errors" => [
                        'Verifikasi' => [
                            'Verifikasi gagal. Harap Login kembali'
                        ]
                    ]
                ], 400));
            }
        }

    }
    public function verifikasi(Request $request){
        $header = $request->header('Authorization');
        if(empty($header)){
            return false;
        }else{

            $bearer = explode(" ",$header);
            $pecah = explode("-",$bearer[1]);
            if(empty($pecah[1])){
                return false;
            }else{
                $data['no_induk'] = $pecah[0];
                $data['token'] = $pecah[1];
            }
            $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'token'=>$data['token']]);
            if($siswa->count() > 0){
                $hasil = $siswa->first();
                return $hasil;
            }else{
                return false;
            }
        }

    }
    public function login(LoginSiswaRequest $request): JsonResponse{
        $data = $request->validated();

        $password = md5($data['password']);
        $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'kode'=>$data['kode'], 'password'=>$password]);
        if($siswa->count() > 0){
            $hasil = $siswa->first();
            $token = Str::random(40);
            $update = RefSiswa::find($hasil->id);
            $update->token = $token;
            $update->save();
            $update->refresh();
            return (new SiswaResource($update))->response()->setStatusCode(201);
        }else{
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Login gagal. Harap pastikan data yang dimasukan sudah benar'
                    ]
                ]
            ], 400));
        }
    }
    public function get_siswa(Request $request): JsonResponse{
        $hasil = $this->verifikasi($request);
        if($hasil){
            return (new SiswaResource($hasil))->response()->setStatusCode(201);
        }else{
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'Verifikasi gagal. Harap Login kembali'
                    ]
                ]
            ], 400));
        }
    }
}
