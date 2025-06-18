<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RefKamar;
use App\Models\EmployeeNew;
use App\Models\Kelengkapan;
use App\Models\SantriKamar;
use App\Models\DetailSantri;
use Illuminate\Http\Request;
use App\Models\RefTahunAjaran;
use Illuminate\Support\Facades\DB;

class KelengkapanController extends Controller
{
    protected $labelKelengkapan = ['Tidak Lengkap', 'Lengkap & Kurang baik', 'lengkap & baik'];

    public function index($idUser)
    {
        try{
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $dataUser = User::select([
                    'employee_new.nama AS namaMurroby',
                    'employee_new.photo AS fotoMurroby',
                    'ref_kamar.code AS kodeKamar',
                    'ref_kamar.id AS idKamar'
                ])
                ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
                ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
                ->where('users.id', $idUser)
                ->first();

            $sub = DB::table('kelengkapan as kl1')
                ->select('kl1.no_induk', DB::raw('MAX(kl1.id) as latest_id'))
                ->groupBy('kl1.no_induk');

            $dataSantri = SantriKamar::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama',
                'kl1.tanggal',
                'kl1.perlengkapan_mandi AS perlengkapanMandi',
                // 'kl1.catatan_mandi AS catatanMandi',
                'kl1.peralatan_sekolah AS peralatanSekolah',
                // 'kl1.catatan_sekolah AS catatanSekolah',
                'kl1.perlengkapan_diri AS perlengkapanDiri',
                // 'kl1.catatan_diri AS catatanDiri',
            ])
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
            ->leftJoinSub($sub, 'latest', function ($join) {
                $join->on('latest.no_induk', '=', 'santri_detail.no_induk');
            })
            ->leftJoin('kelengkapan as kl1', function ($join) {
                $join->on('kl1.no_induk', '=', 'santri_detail.no_induk')
                    ->on('kl1.id', '=', 'latest.latest_id')
                    ->whereNull('kl1.deleted_at');
            })
            ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->where('santri_kamar.status', 1)
            ->where('santri_kamar.kamar_id', $dataUser->idKamar)
            ->get();

            $labelKelengkapan = $this->labelKelengkapan;

            $dataSantri = $dataSantri->map(function ($item) use ($labelKelengkapan) {
                // Format tanggal
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                // Konversi angka ke label kelengkapan
                $item->perlengkapanMandi = $labelKelengkapan[$item->perlengkapanMandi] ?? '-';
                $item->peralatanSekolah = $labelKelengkapan[$item->peralatanSekolah] ?? '-';
                $item->perlengkapanDiri = $labelKelengkapan[$item->perlengkapanDiri] ?? '-';

                return $item;
            });

            $data = [
                'dataUser' => $dataUser,
                'dataSantri' => $dataSantri,
            ];

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
            $data = Kelengkapan::create([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'perlengkapan_mandi' => $request->perlengkapanMandi,
                'catatan_mandi' => $request->catatanMandi,
                'peralatan_sekolah' => $request->peralatanSekolah,
                'catatan_sekolah' => $request->catatanSekolah,
                'perlengkapan_diri' => $request->perlengkapanDiri,
                'catatan_diri' => $request->catatanDiri,
            ]);

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menyimpan data kelengkapan santri.",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function show($noInduk)
    {
        try{
            $dataSantri = DetailSantri::where('no_induk', $noInduk)->first();

            $kamar = RefKamar::where('id', $dataSantri->kamar_id)->first();
            $var['EmployeeNew'] = EmployeeNew::where('id', $kamar->employee_id)->first();

            $labelKelengkapan = $this->labelKelengkapan;
            $kelengkapan = Kelengkapan::where('no_induk', $noInduk)
            ->select([
                'tanggal',
                'perlengkapan_mandi AS perlengkapanMandi',
                'catatan_mandi AS catatanMandi',
                'peralatan_sekolah AS peralatanSekolah',
                'catatan_sekolah AS catatanSekolah',
                'perlengkapan_diri AS perlengkapanDiri',
                'catatan_diri AS catatanDiri',
            ])
            ->orderBy('created_at', 'desc') // jika kamu ingin data terbaru di urutan atas
            ->get()
            ->map(function ($item) use ($labelKelengkapan) {
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                $item->perlengkapanMandi = $labelKelengkapan[$item->perlengkapanMandi] ?? '-';
                $item->peralatanSekolah = $labelKelengkapan[$item->peralatanSekolah] ?? '-';
                $item->perlengkapanDiri = $labelKelengkapan[$item->perlengkapanDiri] ?? '-';

                return $item;
            });

            $data = [
                'namaSantri'    => $dataSantri->nama,
                'dataKelengkapan'  => $kelengkapan
            ];

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

    public function edit($id)
    {
        try{
            $data = Kelengkapan::select([
                'id',
                'tanggal',
                'perlengkapan_mandi AS perlengkapanMandi',
                'catatan_mandi AS catatanMandi',
                'peralatan_sekolah AS peralatanSekolah',
                'catatan_sekolah AS catatanSekolah',
                'perlengkapan_diri AS perlengkapanDiri',
                'catatan_diri AS catatanDiri',
            ])
            ->where('id', $id)
            ->first();

            if ($data && $data->tanggal) {
                $data->tanggal = Carbon::parse($data->tanggal)->format('Y-m-d'); // jadi "2024-12-24"
            }

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"  => $data
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
        try{
            $data = Kelengkapan::where('id', $id)->first();
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'perlengkapan_mandi' => $request->perlengkapanMandi,
                'catatan_mandi' => $request->catatanMandi,
                'peralatan_sekolah' => $request->peralatanSekolah,
                'catatan_sekolah' => $request->catatanSekolah,
                'perlengkapan_diri' => $request->perlengkapanDiri,
                'catatan_diri' => $request->catatanDiri,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data kelengkapan santri.",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function delete($id)
    {
        try{
            $data = Kelengkapan::where('id', $id)->first();
            $data->delete();
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil menghapus data",
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
