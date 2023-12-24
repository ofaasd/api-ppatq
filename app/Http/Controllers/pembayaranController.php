<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RefSiswa;
use App\Models\Pembayaran;

class pembayaranController extends Controller
{
    //
    public function index(Request $request){
        $no_induk = $request->input("no_induk");
        $token = $request->input("token");
        $siswa = RefSiswa::where(['no_induk'=>$no_induk,'token'=>$token]);
        if($siswa->count() == 0){
            return response()->json([
                'message' => 'Verifikasi gagal harap login ulang',
                'code' => 400,
                'data' => [],
            ]);
        }else{
            $new_siswa = $siswa->first();
            $periode = $request->input("periode");
            $tahun = $request->input("tahun");
            $pembayaran = [];
            if($periode == 0){
                $pembayaran = Pembayaran::where(['nama_santri'=>$no_induk,"tahun"=>$tahun])->get();
            }else{
                $pembayaran = Pembayaran::where(['nama_santri'=>$no_induk,"periode"=>$periode,"tahun"=>$tahun])->get();
            }

            return response()->json([
                'message' => 'Verifikasi gagal harap login ulang',
                'code' => 200,
                'data' => $pembayaran,
            ]);
        }
    }
}
