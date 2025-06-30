<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function indexPembayaran()
    {
        try{
            $data = Tutorial::select([
                'id',
                'urutan',
                'jenis',
                'teks',
            ])
            ->orderBy('urutan', 'asc')
            ->where('jenis', 'pembayaran')
            ->get();

            $rekening = Rekening::select([
                'ref_bank.nama AS namaBank',
                'rekening.no AS noRekening',
                'rekening.kode_bank AS kodeBank',
                'rekening.atas_nama AS atasNama',
            ])
            ->leftJoin('ref_bank', 'ref_bank.kode', '=', 'rekening.kode_bank')
            ->first();

            $teksUrutan2 = '<div>Rekening tujuannya adalah&nbsp;<br><br>'. $rekening->namaBank .' kode bank : '. $rekening->kodeBank .'&nbsp;<br>Nomor rekening : '. $rekening->noRekening .'<br>Nama pemilik rekening : '. $rekening->atasNama .'</div>';

            if (!$data->contains('urutan', 2)) {
                $data->push((object)[
                    'id' => null,
                    'urutan' => 2,
                    'jenis' => 'pembayaran',
                    'teks' => $teksUrutan2,
                ]);
            }

            $data = $data->sortBy('urutan')->values();

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
