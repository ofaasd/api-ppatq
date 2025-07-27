<?php

namespace App\Http\Controllers;

use App\Models\Kerapian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KerapianController extends Controller
{
    public function index()
    {
        try{
            $data = Kerapian::select([
                'kerapian.id',
                'kerapian.tanggal',
                'santri_detail.nama',
                'kerapian.sandal',
                'kerapian.sepatu',
                'kerapian.box_jajan AS boxJajan',
                'kerapian.alat_mandi AS alatMandi',
                'kerapian.tindak_lanjut AS tindakLanjut',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'kerapian.no_induk')
            ->leftJoin('users', 'users.id', '=', 'kerapian.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->orderBy('kerapian.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->sandal = match ($item->sandal) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->sepatu = match ($item->sepatu) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->boxJajan = match ($item->boxJajan) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

                $item->alatMandi = match ($item->alatMandi) {
                    0 => "Tidak Ditata",
                    1 => "Ditata",
                    default => "-"
                };

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
                'sandal' => $request->sandal,
                'sepatu' => $request->sepatu,
                'box_jajan' => $request->boxJajan,
                'alat_mandi' => $request->alatMandi,
                'tindak_lanjut' => $request->tindakLanjut,
                'by_id' => $request->user()->id, 
            ];

            $data = Kerapian::create($data);
            
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
            $data = Kerapian::select([
                'kerapian.id',
                'kerapian.no_induk AS noInduk',
                'kerapian.tanggal',
                'kerapian.sandal',
                'kerapian.sepatu',
                'kerapian.box_jajan AS boxJajan',
                'kerapian.alat_mandi AS alatMandi',
                'kerapian.tindak_lanjut AS tindakLanjut',
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
            $data = Kerapian::find($id);

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
                'sandal' => $request->sandal,
                'sepatu' => $request->sepatu,
                'box_jajan' => $request->boxJajan,
                'alat_mandi' => $request->alatMandi,
                'tindak_lanjut' => $request->tindakLanjut,
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
            $data = Kerapian::find($id);

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
