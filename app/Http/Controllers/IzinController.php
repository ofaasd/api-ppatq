<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Izin;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        try{
            $data = Izin::select([
                'izin.id',
                'santri_detail.nama',
                'izin.tanggal',
                'izin.keluar',
                'izin.kembali',
                'izin.status',
                'izin.kategori',
                'izin.kategori_pelanggaran AS kategoriPelanggaran',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'izin.no_induk')
            ->leftJoin('users', 'users.id', '=', 'izin.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');
                $item->keluar = Carbon::parse($item->keluar)->translatedFormat('H:i');
                $item->kembali = Carbon::parse($item->kembali)->translatedFormat('H:i');

                $item->status = match ($item->status) {
                    0 => "Tidak Izin",
                    1 => "Izin",
                    default => "-"
                };

                $item->kategori = match ($item->kategori) {
                    1 => "Izin Sambangan",
                    2 => "Izin Pulang",
                    default => "-"
                };

                $item->kategoriPelanggaran = match ($item->kategoriPelanggaran) {
                    1 => "Ringan",
                    2 => "Berat",
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
                'keluar' => $request->keluar,
                'kembali' => $request->kembali,
                'status' => $request->status,
                'kategori' => $request->kategori,
                'kategori_pelanggaran' => $request->kategoriPelanggaran,
                'by_id' => $request->user()->id, 
            ];

            $data = Izin::create($data);
            
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
            $data = Izin::select([
                'izin.no_induk AS noInduk',
                'izin.tanggal',
                'izin.keluar',
                'izin.kembali',
                'izin.status',
                'izin.kategori',
                'izin.kategori_pelanggaran AS kategoriPelanggaran',
            ])
            ->where('id', $id)
            ->first();

            if($data)
            {
                $data->keluar = Carbon::parse($data->keluar)->translatedFormat('H:i');
                $data->kembali = Carbon::parse($data->kembali)->translatedFormat('H:i');
            }

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
            $data = Izin::find($id);

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
                'keluar' => $request->keluar,
                'kembali' => $request->kembali,
                'status' => $request->status,
                'kategori' => $request->kategori,
                'kategori_pelanggaran' => $request->kategoriPelanggaran,
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
            $data = Izin::find($id);

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
