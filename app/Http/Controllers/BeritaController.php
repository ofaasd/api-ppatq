<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @OA\Info(
 *      title="API User Documentation",
 *      version="1.0.0",
 *      description="Dokumentasi API untuk User",
 * )
 */

class BeritaController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/berita",
     *      operationId="index",
     *      tags={"Berita"},
     *      summary="Menampilkan Data Berita",
     *      description="Mengembalikan daftar berita yang tersedia",
     *      @OA\Response(
     *          response=200,
     *          description="Berhasil mengambil data",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="integer", example=200),
     *              @OA\Property(property="message", type="string", example="Berhasil mengambil data"),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="judul", type="string", example="Judul Berita"),
     *                      @OA\Property(property="thumbnail", type="string", format="url", example="https://www.ppatq-rf.sch.id/wp-content/uploads/thumbnail.jpg"),
     *                      @OA\Property(property="gambar_dalam", type="string", format="url", example="https://www.ppatq-rf.sch.id/wp-content/uploads/gambar_dalam.jpg"),
     *                      @OA\Property(property="isi_berita", type="string", example="<p>Hello World</p>"),
     *                  ),
     *              ),
     *          ),
     *      ),
     * )
     */

    public function index(Request $request){
        try{
            $perPage = $request->input('per_page', 5);

            $data = DB::table('berita')
                ->select(
                    'judul',
                    'thumbnail',
                    'gambar_dalam',
                    'isi_berita'
                    )
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->whereNull('berita.deleted_at')
                ->orderBy('berita.created_at', 'desc')
                ->paginate($perPage);

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
}
