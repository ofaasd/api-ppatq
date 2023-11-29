<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\VerifikasiSiswaRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\RefSiswa;
use App\Http\Resources\SiswaResource;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function verifikasi(VerifikasiSiswaRequest $request): JsonResponse{
        $data = $request->validated();

        $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'kode'=>$data['kode']]);
        if($siswa->count() > 0){
            $hasil = $siswa->first();
            return (new SiswaResource($hasil))->response()->setStatusCode(201);
        }else{
            throw new HttpResponseException(response([
                "errors" => [
                    'Verifikasi' => [
                        'No Induk dan Kode tidak sama'
                    ]
                ]
            ], 400));
        }
    }
}
