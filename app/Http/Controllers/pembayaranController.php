<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RefSiswa;
use App\Models\pembayaran;
use App\Models\detailPembayaran;
use App\Models\SakuMasuk;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Image;
use DB;

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
                $pembayaran = pembayaran::where(['nama_santri'=>$no_induk,"tahun"=>$tahun])->get();
            }else{
                $pembayaran = pembayaran::where(['nama_santri'=>$no_induk,"periode"=>$periode,"tahun"=>$tahun])->get();
            }

            return response()->json([
                'message' => 'Verifikasi gagal harap login ulang',
                'code' => 200,
                'data' => $pembayaran,
            ]);
        }
    }
    public function store(Request $request){
        $header = $request->header('Authorization');
        $verifikasi = 0;
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
            if(empty($pecah[1])){
                throw new HttpResponseException(response([
                    "errors" => [
                        'Verifikasi' => [
                            'Verifikasi gagal. Header yang dimasukan tidak sesuai standar'
                        ]
                    ]
                ], 400));
            }else{
                $data['no_induk'] = $pecah[0];
                $data['token'] = $pecah[1];
                $siswa = RefSiswa::where(['no_induk'=>$data['no_induk'], 'token'=>$data['token']]);
                if($siswa->count() > 0){
                    $verifikasi = 1;
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
        if($verifikasi = 1){
            if($request->validate([
                'bukti' => [File::types(['jpg', 'jpeg', 'png', 'pdf'])->max(10 * 1024)],
            ])){
                $data2 = array(
                    'nama_santri' => $request->input('nama_santri'),
                    'jumlah' => $request->input('jumlah'),
                    'tanggal_bayar' => $request->input('tanggal_bayar'),
                    'periode' => $request->input('periode'),
                    'tahun' => $request->input('tahun'),
                    'bank_pengirim' => $request->input('bank_pengirim'),
                    'atas_nama' => $request->input('atas_nama'),
                    'no_wa' => $request->input('no_wa'),
                    'is_hapus' => 0,
                );
                $cek = pembayaran::where($data2)->count();
                $data = [];
                if($cek > 0){
                    throw new HttpResponseException(response([
                        "errors" => [
                            'Verifikasi' => [
                                'Data Sudah pernah dimasukan'
                            ]
                        ]
                    ], 400));
                }

                if($request->file('bukti')){

                    $file = $request->file('bukti');
                    $ekstensi = $file->extension();
                    if(strtolower($ekstensi) == 'jpg' || strtolower($ekstensi) == 'png' || strtolower($ekstensi) == 'jpeg'){
                        $filename = date('YmdHis') . $file->getClientOriginalName();

                        $kompres = Image::make($file)
                        ->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save('assets/upload/' . $filename);

                    }else{
                        $filename = date('YmdHis') . $file->getClientOriginalName();
                        $file->move('assets/upload/',$filename);
                    }
                    $data = array(
                        'nama_santri' => $request->input('nama_santri'),
                        'jumlah' => $request->input('jumlah'),
                        'tanggal_bayar' => $request->input('tanggal_bayar'),
                        'periode' => $request->input('periode'),
                        'tahun' => $request->input('tahun'),
                        'bank_pengirim' => $request->input('bank_pengirim'),
                        'atas_nama' => $request->input('atas_nama'),
                        'no_wa' => $request->input('no_wa'),
                        'catatan' => $request->input('catatan'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'bukti' => $filename,
                        'input_by' => 3, //input lewat api / aplikasi
                    );
                    $pembayaran = pembayaran::insert($data);
                    $id = DB::getPdo()->lastInsertId();
                    $jenis_pembayaran = $request->input('jenis_pembayaran');
				    $id_jenis_pembayaran = $request->input('id_jenis_pembayaran');
                    foreach($jenis_pembayaran as $key=>$value){
                        if($value != 0 && !empty($value)){

                            $data_detail = array(
                                'id_pembayaran'=>$id,
                                'id_jenis_pembayaran' => $id_jenis_pembayaran[$key],
                                'nominal' => $value,
                            );
                            $query = detailPembayaran::insert($data_detail);
                        }

                        if($id_jenis_pembayaran == 3){
                            $data_saku = array(
                                'dari' => 1,
                                'jumlah' => $value,
                                'tanggal' => $request->input('tanggal_bayar'),
                                'no_induk' => $request->input('nama_santri'),
                                'id_pembayaran' => $id,
                                'status_pembayaran' => 0
                            );
                            $query2 = SakuMasuk::insert($data_saku);
                        }
                    }
                    $berhasil = 1;
                }else{
                    throw new HttpResponseException(response([
                        "errors" => [
                            'Verifikasi' => [
                                'harus menyertakan file bukti pembayaran'
                            ]
                        ]
                    ], 400));
                }
            }else{
                throw new HttpResponseException(response([
                    "errors" => [
                        'Verifikasi' => [
                            'File yang di upload tidak valid'
                        ]
                    ]
                ], 400));
            }

            if($berhasil == 1){
                return response()->json([
                    'message' => 'Data berhasildimasukan',
                    'code' => 200,
                    'data' => "Berhasil Dimasukan",
                ])->setStatusCode(201);
            }
        }
    }
}
