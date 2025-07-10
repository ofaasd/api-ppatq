<?php

namespace App\Http\Controllers;

use App\Models\Dakwah;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;

class DawuhAbahController extends Controller
{
    public function index()
    {
        try{
            $data = Dakwah::select([
                'id',
                'judul',
                'foto',
                'isi_dakwah AS isiDakwah',
            ])
            ->latest()
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $slug = Str::slug($request->judul);
            $file = $request->file('foto');
            $ekstensi = $file->extension();

            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);

            if(strtolower($ekstensi) == 'jpg' || strtolower($ekstensi) == 'png' || strtolower($ekstensi) == 'jpeg'){

                $kompres = Image::make($file)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('assets/upload/dawuh-abah/' . $fileName);

            }else{
                $fileName = date('YmdHis') . $file->getClientOriginalName();
                $file->move('assets/upload/dawuh-abah/',$fileName);
            }

            
            $data = [
                'judul' => $request->judul,
                'slug' => $slug,
                'foto' => $fileName,
                'isi_dakwah' => $request->isiDakwah,
                'user_id' => 63, // Id Abah
            ];
            $data = Dakwah::create($data);

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

    public function edit(int $id)
    {
        try{
            $data = Dakwah::select([
                'id',
                'judul',
                'foto',
                'isi_dakwah AS isiDakwah',
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
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            // return response()->json($request->all());
            $data = Dakwah::find($id);

            if (!$data) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            $slug = Str::slug($request->judul);
            $fileName = $data->foto; // Default pakai yang lama

            if ($request->hasFile('foto')) 
            {
                $file = $request->file('foto');
                $ekstensi = strtolower($file->getClientOriginalExtension());

                // Buat nama file unik dan hilangkan spasi
                $fileName = date('YmdHis') . '-' . str_replace(' ', '-', $file->getClientOriginalName());

                $path = 'assets/upload/dawuh-abah/';

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
                if ($data->foto && file_exists(public_path($path . $data->foto))) {
                    unlink(public_path($path . $data->foto));
                }
            }

            // Update data
            $data->update([
                'judul' => $request->judul,
                'slug' => $slug,
                'foto' => $fileName,
                'isi_dakwah' => $request->isiDakwah,
                'user_id' => 63, // id abah
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
            $data = Dakwah::find($id);

            if (!$data) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            // Jika ada file foto yang ingin dihapus juga
            $path = public_path('assets/upload/dawuh-abah/' . $data->foto);
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
