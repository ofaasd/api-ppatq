<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PelanggaranKetertiban;

class PelanggaranKetertibanController extends Controller
{
    public function index()
    {
        try{
            $data = PelanggaranKetertiban::select([
                'pelanggaran_ketertiban.id',
                'pelanggaran_ketertiban.tanggal',
                'santri_detail.nama',
                'pelanggaran_ketertiban.buang_sampah AS buangSampah',
                'pelanggaran_ketertiban.menata_peralatan AS menataPeralatan',
                'pelanggaran_ketertiban.tidak_berseragam AS tidakBerseragam',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'pelanggaran_ketertiban.no_induk')
            ->leftJoin('users', 'users.id', '=', 'pelanggaran_ketertiban.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                return $item;
            });
            
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
            $data = [
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'buang_sampah' => $request->buangSampah,
                'menata_peralatan' => $request->menataSeralatan,
                'tidak_berseragam' => $request->tidakBerseragam,
                'by_id' => $request->user()->id, 
            ];

            $data = PelanggaranKetertiban::create($data);
            
            return response()->json([
                "status"  => 201,
                "message" => "Berhasil membuat data",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function edit(int $id)
    {
        try{
            $data = PelanggaranKetertiban::select([
                'pelanggaran_ketertiban.id',
                'pelanggaran_ketertiban.no_induk AS noInduk',
                'pelanggaran_ketertiban.tanggal',
                'pelanggaran_ketertiban.buang_sampah AS buangSampah',
                'pelanggaran_ketertiban.menata_peralatan AS menataPeralatan',
                'pelanggaran_ketertiban.tidak_berseragam AS tidakBerseragam',
            ])
            ->where('id', $id)
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
        try {
            $data = PelanggaranKetertiban::find($id);

            if (!$data) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            // Update data
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'buang_sampah' => $request->buangSampah,
                'menata_peralatan' => $request->menataSeralatan,
                'tidak_berseragam' => $request->tidakBerseragam,
                'by_id' => $request->user()->id, 
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengubah data.",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error" => $e->getMessage() // Uncomment jika perlu debugging
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = PelanggaranKetertiban::find($id);

            if (!$data) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            $data->delete();

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
