<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Perilaku;
use App\Models\RefKamar;
use App\Models\EmployeeNew;

use App\Models\SantriKamar;
use App\Models\DetailSantri;
use Illuminate\Http\Request;
use App\Models\RefTahunAjaran;
use App\Models\SantriDetail;
use Illuminate\Support\Facades\DB;

class PerilakuController extends Controller
{
    protected $labelPerilaku = ['Kurang Baik', 'Cukup', 'Baik'];
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

            $sub = DB::table('perilaku as pr1')
                ->select('pr1.no_induk', DB::raw('MAX(pr1.id) as latest_id'))
                ->groupBy('pr1.no_induk');

            $dataSantri = SantriDetail::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama',
                'pr1.tanggal',
                'pr1.ketertiban',
                'pr1.kedisiplinan',
                'pr1.kerapian',
                'pr1.kesopanan',
                'pr1.kepekaan_lingkungan AS kepekaanLingkungan',
                'pr1.ketaatan_peraturan AS ketaatanPeraturan',
            ])
            ->leftJoinSub($sub, 'latest', function ($join) {
                $join->on('latest.no_induk', '=', 'santri_detail.no_induk');
            })
            ->leftJoin('perilaku as pr1', function ($join) {
                $join->on('pr1.no_induk', '=', 'santri_detail.no_induk')
                    ->on('pr1.id', '=', 'latest.latest_id')
                    ->whereNull('pr1.deleted_at');
            })
            // ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->where('santri_detail.kamar_id', $dataUser->idKamar)
            ->get();

            $labelPerilaku = $this->labelPerilaku;

            $dataSantri = $dataSantri->map(function ($item) use ($labelPerilaku) {
                // Format tanggal
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                // Konversi angka ke label perilaku
                $item->ketertiban = $labelPerilaku[$item->ketertiban] ?? '-';
                $item->kedisiplinan = $labelPerilaku[$item->kedisiplinan] ?? '-';
                $item->kerapian = $labelPerilaku[$item->kerapian] ?? '-';
                $item->kesopanan = $labelPerilaku[$item->kesopanan] ?? '-';
                $item->kepekaanLingkungan = $labelPerilaku[$item->kepekaanLingkungan] ?? '-';
                $item->ketaatanPeraturan = $labelPerilaku[$item->ketaatanPeraturan] ?? '-';

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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $data = Perilaku::create([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'ketertiban' => $request->ketertiban,
                'kebersihan' => $request->kebersihan,
                'kedisiplinan' => $request->kedisiplinan,
                'kerapian' => $request->kerapian,
                'kesopanan' => $request->kesopanan,
                'kepekaan_lingkungan' => $request->kepekaanLingkungan,
                'ketaatan_peraturan' => $request->ketaatanPeraturan,
            ]);

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menyimpan data perilaku santri.",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function show($noInduk)
    {
        try{
            $dataSantri = DetailSantri::where('no_induk', $noInduk)->first();

            $kamar = RefKamar::where('id', $dataSantri->kamar_id)->first();
            $var['EmployeeNew'] = EmployeeNew::where('id', $kamar->employee_id)->first();

            $labelPerilaku = $this->labelPerilaku;
            $perilaku = Perilaku::where('no_induk', $noInduk)
            ->select([
                'id',
                'tanggal',
                'ketertiban',
                'kebersihan',
                'kedisiplinan',
                'kerapian',
                'kesopanan',
                'kepekaan_lingkungan AS kepekaanLingkungan',
                'ketaatan_peraturan AS ketaatanPeraturan',
            ])
            ->orderBy('tanggal', 'desc') // jika kamu ingin data terbaru di urutan atas
            ->get()
            ->map(function ($item) use ($labelPerilaku) {
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                $item->ketertiban = $labelPerilaku[$item->ketertiban] ?? '-';
                $item->kebersihan = $labelPerilaku[$item->kebersihan] ?? '-';
                $item->kedisiplinan = $labelPerilaku[$item->kedisiplinan] ?? '-';
                $item->kerapian = $labelPerilaku[$item->kerapian] ?? '-';
                $item->kesopanan = $labelPerilaku[$item->kesopanan] ?? '-';
                $item->kepekaanLingkungan = $labelPerilaku[$item->kepekaanLingkungan] ?? '-';
                $item->ketaatanPeraturan = $labelPerilaku[$item->ketaatanPeraturan] ?? '-';

                return $item;
            });

            $data = [
                'namaSantri'    => $dataSantri->nama,
                'noInduk'    => $dataSantri->no_induk,
                'dataPerilaku'  => $perilaku
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function edit($id)
    {
        try{
            $data = Perilaku::select([
                'id',
                'tanggal',
                'ketertiban',
                'kebersihan',
                'kedisiplinan',
                'kerapian',
                'kesopanan',
                'kepekaan_lingkungan AS kepekaanLingkungan',
                'ketaatan_peraturan AS ketaatanPeraturan',
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
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Perilaku::where('id', $id)->first();
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'ketertiban' => $request->ketertiban,
                'kebersihan' => $request->kebersihan,
                'kedisiplinan' => $request->kedisiplinan,
                'kerapian' => $request->kerapian,
                'kesopanan' => $request->kesopanan,
                'kepekaan_lingkungan' => $request->kepekaanLingkungan,
                'ketaatan_peraturan' => $request->ketaatanPeraturan,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data pemeriksaan santri",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function delete($id)
    {
        try{
            $data = Perilaku::where('id', $id)->first();
            $data->delete();
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil menghapus data",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
}
