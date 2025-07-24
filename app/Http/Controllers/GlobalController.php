<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KodeJuz;
use App\Models\EmployeeNew;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailSantriTahfidz;

class GlobalController extends Controller
{
    private function getCapaian($noIndukList, $referenceUrutan, $direction = 'ASC')
    {
        // Ambil capaian tertinggi/rendah setiap santri
        $sub = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.no_induk',
                DB::raw('MAX(kode_juz.urutan) as max_urutan'),
                DB::raw('MIN(kode_juz.urutan) as min_urutan')
            ])
            ->join('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->whereIn('detail_santri_tahfidz.no_induk', $noIndukList)
            ->whereNotNull('detail_santri_tahfidz.kode_juz_surah')
            ->groupBy('detail_santri_tahfidz.no_induk');

        // Pilih urutan berdasarkan direction
        $urutanField = $direction === 'ASC' ? 'min_urutan' : 'max_urutan';

        $santriCapaian = DB::table(DB::raw("({$sub->toSql()}) as capaian"))
            ->mergeBindings($sub->getQuery())
            ->get()
            ->pluck($urutanField, 'no_induk');

        if ($santriCapaian->isEmpty()) {
            return [
                'capaian' => 'Belum ada aktivitas ketahfidzan',
                'jumlah' => 0,
                'santri' => collect(),
            ];
        }

        // Ambil urutan capaian yang paling tinggi/rendah
        $targetUrutan = $direction === 'ASC'
            ? $santriCapaian->min()
            : $santriCapaian->max();

        // Ambil kode_juz_surah yang sesuai urutan
        $kodeJuz = KodeJuz::where('urutan', $targetUrutan)->first();

        if (!$kodeJuz) {
            return [
                'capaian' => 'Belum ada aktivitas ketahfidzan',
                'jumlah' => 0,
                'santri' => collect(),
            ];
        }

        // Ambil santri yang capaian tertinggi/rendahnya sama dengan urutan target
        $santri = SantriDetail::whereIn('no_induk', $santriCapaian->filter(fn($u) => $u == $targetUrutan)->keys())
            ->select([
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'employee_new.nama AS guruTahfidz',
                'employee_new.photo AS photoUstadTahfidz'
            ])
            ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'ref_tahfidz.employee_id')
            ->get()
            ->map(function ($item) {
                $item->kelas = strtoupper($item->kelas);
                return $item;
            });

        return [
            'capaian' => $kodeJuz->nama ?? 'Belum ada aktivitas ketahfidzan',
            'jumlah' => $santri->count(),
            'santri' => $santri,
        ];
    }

    private function getCapaianTertinggiKhusus($noIndukList, $kodeList)
    {
        $result = [];
        foreach ($kodeList as $kode) {
            $capaianData = KodeJuz::where('kode', $kode)->first();
            if (!$capaianData) continue;

            // Cari santri yang capaian tertingginya adalah kode ini berdasarkan urutan tertinggi
            $santri = SantriDetail::whereIn('no_induk', $noIndukList)
                ->whereIn('no_induk', function($query) use ($kode) {
                    $query->select('no_induk')
                        ->from('detail_santri_tahfidz')
                        ->join('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
                        ->whereNotNull('detail_santri_tahfidz.kode_juz_surah')
                        ->groupBy('no_induk')
                        ->havingRaw('MAX(kode_juz.urutan) = (SELECT urutan FROM kode_juz WHERE kode = ?)', [$kode]);
                })
                ->select([
                    'santri_detail.nama',
                    'santri_detail.photo',
                    'santri_detail.kelas',
                    'employee_new.nama AS guruTahfidz',
                    'employee_new.photo AS photoUstadTahfidz'
                ])
                ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
                ->leftJoin('employee_new', 'employee_new.id', '=', 'ref_tahfidz.employee_id')
                ->get()
                ->map(function ($item) {
                    $item->kelas = strtoupper($item->kelas);
                    return $item;
                });

            $result[] = [
                'capaian' => $capaianData->nama,
                'jumlah' => $santri->count(),
                'santri' => $santri,
            ];
        }
        return $result;
    }

    public function capaianTahfidz()
    {
        try {
            $kodeTertinggi = KodeJuz::max('urutan');
            $noIndukList = SantriDetail::pluck('no_induk');

            $kodeJuz7Terakhir = [164, 125, 113, 98, 83, 68, 53];
            $data = [
                'capaianCustom'  => $this->getCapaianTertinggiKhusus($noIndukList, $kodeJuz7Terakhir),
                'terendah' => $this->getCapaian($noIndukList, $kodeTertinggi, 'ASC'),
            ];

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data capaian tahfidz",
                "data"    => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
    
    public function ulangTahun()
    {
        try{
            $now = Carbon::now();

            $pegawai = EmployeeNew::select(['nama', 'photo', 'tanggal_lahir AS tanggalLahir'])
                ->whereMonth('tanggal_lahir', $now->month)
                ->whereDay('tanggal_lahir', $now->day)
                ->get()
                ->map(function ($item) use ($now) {
                    $item->ke = $item->tanggalLahir ? $now->year - Carbon::parse($item->tanggalLahir)->year : '-';
                    return $item;
                });

            if ($pegawai->isEmpty()) {
                $pegawai = [[
                    'nama' => '-',
                    'tanggalLahir' => '-',
                    'ke' => '-',
                ]];
            }

            $santri = SantriDetail::select([
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'santri_detail.tanggal_lahir AS tanggalLahir',
                'murroby.nama AS namaMurroby',
                'murroby.photo AS photoMurroby',
            ])
            ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
            ->leftJoin('employee_new AS murroby', 'murroby.id', '=', 'ref_kamar.employee_id')
            ->whereMonth('santri_detail.tanggal_lahir', $now->month)
            ->whereDay('santri_detail.tanggal_lahir', $now->day)
            ->get()
            ->map(function ($item) use ($now) {
                $item->kelas = strtoupper($item->kelas);
                $item->ke = $item->tanggalLahir ? $now->year - Carbon::parse($item->tanggalLahir)->year : '-';
                return $item;
            });

            if ($santri->isEmpty()) {
                $santri = [[
                    'nama' => '-',
                    'photo' => '-',
                    'tanggalLahir' => '-',
                    'namaMurroby' => '-',
                    'photoMurroby' => '-',
                    'ke' => '-',
                ]];
            }

            $data = [
                'pegawai' => $pegawai,
                'santri' => $santri,
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
}
