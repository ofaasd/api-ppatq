<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class PelanggaranController extends Controller
{
    public function index()
    {
        try{
            $data = Pelanggaran::select([
                'pelanggaran.id',
                'santri_detail.nama',
                'pelanggaran.tanggal',
                'pelanggaran.jenis AS jenisPelanggaran',
                'pelanggaran.kategori',
                'pelanggaran.hukuman',
                'pelanggaran.bukti',
                'employee_new.nama AS namaPengisi',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'pelanggaran.no_induk')
            ->leftJoin('users', 'users.id', '=', 'pelanggaran.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->where('santri_detail.status', 0)
            ->orderBy('pelanggaran.tanggal', 'desc')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->kategori = match ($item->kategori) {
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
            $file = $request->file('bukti');

            $fileName = null;
            if($request->has('bukti'))
            {
                $ekstensi = $file->extension();

                $fileName = date('YmdHis') . $file->getClientOriginalName();
                $fileName = str_replace(' ', '-', $fileName);

                if(strtolower($ekstensi) == 'jpg' || strtolower($ekstensi) == 'png' || strtolower($ekstensi) == 'jpeg'){

                    $kompres = Image::make($file)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save('assets/upload/pelanggaran/' . $fileName);

                }else{
                    $fileName = date('YmdHis') . $file->getClientOriginalName();
                    $file->move('assets/upload/pelanggaran/',$fileName);
                }
            }

            $data = [
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenisPelanggaran,
                'kategori' => $request->kategori,
                'hukuman' => $request->hukuman,
                'bukti' => $fileName,
                'by_id' => $request->user()->id, 
            ];

            $data = Pelanggaran::create($data);
            
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
            $data = Pelanggaran::select([
                'pelanggaran.no_induk AS noInduk',
                'pelanggaran.tanggal',
                'pelanggaran.jenis AS jenisPelanggaran',
                'pelanggaran.kategori',
                'pelanggaran.hukuman',
                'pelanggaran.bukti',
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
            $data = Pelanggaran::find($id);

            if (!$data) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            $fileName = $data->bukti; // Default pakai yang lama

            if ($request->hasFile('bukti')) 
            {
                $file = $request->file('bukti');
                $ekstensi = strtolower($file->getClientOriginalExtension());

                // Buat nama file unik dan hilangkan spasi
                $fileName = date('YmdHis') . '-' . str_replace(' ', '-', $file->getClientOriginalName());

                $path = 'assets/upload/pelanggaran/';

                // Cek apakah file gambar
                if (in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
                    // Kompres dan simpan gambar
                    Image::make($file)
                        ->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path($path . $fileName));
                } else {
                    // Simpan file tanpa kompres
                    $file->move(public_path($path), $fileName);
                }

                // Hapus file lama jika ada
                if ($data->bukti && file_exists(public_path($path . $data->bukti))) {
                    unlink(public_path($path . $data->bukti));
                }
            }

            // Update data
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenisPelanggaran,
                'kategori' => $request->kategori,
                'hukuman' => $request->hukuman,
                'bukti' => $fileName,
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
            $data = Pelanggaran::find($id);

            if (!$data) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            // Jika ada file foto yang ingin dihapus juga
            $path = public_path('assets/upload/pelanggaran/' . $data->bukti);
            if (file_exists($path)) {
                unlink($path);
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
