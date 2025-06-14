<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function indexPembayaran()
    {
        try{
            $data = Tutorial::select([
                'id',
                'jenis',
                'teks',
            ])
            ->where('jenis', 'pembayaran')
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
    public function storePembayaran(Request $request)
    {
        $data = Tutorial::where('id', $request->idJenisTutorial)->first();
        $data->update([
            'teks'  => $request->teks
        ]);

        if ($data) {
            return response()->json('Berhasil mengupdate data.');
        } else {
            return response()->json('Gagal mengupdate data.');
        }
    }
}
