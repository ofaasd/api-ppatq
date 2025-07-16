<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\RefKategori;
use App\Models\ReplyKeluhan;
use Illuminate\Http\Request;

class ReplyKeluhanController extends Controller
{
    public function index()
    {
        try{
            $kategori = RefKategori::all();

            $arrKategori = [];
            foreach($kategori as $row)
            {
                // $arrKategori[$row->id]['nama'] = $row->nama;
                $arrKategori[$row->nama]['value'] =  $data = Keluhan::select([
                    'tb_keluhan.id AS idKeluhan',
                    'reply_keluhan.id AS idBalasan',
                    'tb_keluhan.nama_pelapor AS namaPelapor',
                    'tb_keluhan.email',
                    'tb_keluhan.no_hp AS noHp',
                    'santri_detail.nama AS namaSantri',
                    'tb_keluhan.nama_wali_santri AS namaWaliSantri',
                    'tb_keluhan.jenis',
                    'tb_keluhan.status',
                    'tb_keluhan.id_kategori AS idKategori',
                    'tb_keluhan.masukan',
                    'tb_keluhan.saran',
                    'tb_keluhan.rating',
                    'reply_keluhan.pesan AS balasan',
                ])
                ->leftJoin('reply_keluhan', 'reply_keluhan.id_keluhan', '=', 'tb_keluhan.id')
                ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'tb_keluhan.id_santri')
                ->where('tb_keluhan.is_hapus', 0)
                ->orderBy('tb_keluhan.created_at', 'desc')
                ->where('tb_keluhan.id_kategori', $row->id)
                ->get()
                ->map(function($item){
                    $item->status = match ($item->status) {
                        1 => 'Belum Ditangani',
                        2 => 'Ditangani',
                        default => 'Status tidak diketahui',
                    };
                    return $item;
                });
            }

            $data = $arrKategori;

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

    public function store(Request $request)
    {
        try{
            $cek = ReplyKeluhan::where('id_keluhan', $request->idKeluhan)->first();
            if ($cek) {
                return response()->json([
                    "status"  => 409,
                    "message" => "Gagal, keluhan sudah dibalas sebelumnya.",
                ], 409);
            }

            $data = [
                'id_keluhan' => $request->idKeluhan,
                'pesan' => $request->pesan,
            ];
            
            $data = ReplyKeluhan::create($data);

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menyimpan data",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function edit($id)
    {
        try{
            $data = Keluhan::select([
                    'tb_keluhan.id',
                    'tb_keluhan.nama_pelapor AS namaPelapor',
                    'tb_keluhan.status',
                    'tb_keluhan.masukan',
                    'tb_keluhan.saran',
                    'reply_keluhan.pesan AS balasan',
                ])
                ->leftJoin('reply_keluhan', 'reply_keluhan.id_keluhan', '=', 'tb_keluhan.id')
                ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'tb_keluhan.id_santri')
                ->leftJoin('ref_kategori', 'ref_kategori.id', '=', 'tb_keluhan.id_kategori')
                ->where('tb_keluhan.id', $id)
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $keluhan = Keluhan::where('id', $id)->first();
            $reply = ReplyKeluhan::where('id_keluhan', $id)->first();

            $keluhan->update([
                'status'    => $request->status,
            ]);

            $reply->update([
                'pesan' => $request->pesan
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengubah data.",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function destroy($idBalasan)
    {
        try {
            $cek = ReplyKeluhan::where('id', $idBalasan)->first();
            $cek->delete();

            return response()->json([
                "status"  => 200,
                "message" => "Data berhasil dihapus.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error" => $e->getMessage() // Aktifkan untuk debug
            ], 500);
        }
    }
}
