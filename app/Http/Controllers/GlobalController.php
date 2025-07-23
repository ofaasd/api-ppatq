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
        // First, find the single best/worst capaian based on kode_juz.urutan
        $capaianData = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.kode_juz_surah',
                'kode_juz.nama AS capaian_text', // Alias to avoid conflict if 'nama' is used elsewhere
                'kode_juz.urutan as juz_urutan' // Get the urutan to verify
            ])
            ->join('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah') // JOIN first
            ->whereIn('detail_santri_tahfidz.no_induk', $noIndukList)
            ->whereNotNull('detail_santri_tahfidz.kode_juz_surah')
            ->orderBy('juz_urutan', $direction) // ORDER BY the actual 'urutan'
            ->first();

        // Handle case where no capaian data is found
        if (is_null($capaianData)) {
            return [
                'capaian' => 'Belum ada aktivitas ketahfidzan',
                'jumlah' => 0,
                'santri' => collect(), // Return an empty collection
            ];
        }

        // Now, get all santri who have this specific capaian (kode_juz_surah and urutan)
        $santri = DetailSantriTahfidz::join('santri_detail', 'detail_santri_tahfidz.no_induk', '=', 'santri_detail.no_induk')
            ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'ref_tahfidz.employee_id')
            ->whereIn('detail_santri_tahfidz.no_induk', $noIndukList)
            // Match both the kode_juz_surah and its corresponding urutan for precision
            ->where('detail_santri_tahfidz.kode_juz_surah', $capaianData->kode_juz_surah)
            ->whereExists(function ($query) use ($capaianData) {
                $query->select(DB::raw(1))
                    ->from('kode_juz')
                    ->whereRaw('kode_juz.kode = detail_santri_tahfidz.kode_juz_surah')
                    ->where('kode_juz.urutan', $capaianData->juz_urutan);
            })
            ->select([
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'employee_new.nama AS guruTahfidz'
            ])
            ->distinct('santri_detail.no_induk') // Use distinct on no_induk to get unique santri
            ->get()
            ->map(function ($item) {
                $item->kelas = strtoupper($item->kelas); // Kapital semua
                return $item;
            });

        return [
            'capaian' => $capaianData->capaian_text ?? 'Belum ada aktivitas ketahfidzan',
            'jumlah' => $santri->count(),
            'santri' => $santri,
        ];
    }

    public function capaianTahfidz()
    {
        try {
            $kodeTertinggi = KodeJuz::max('urutan');
            $noIndukList = SantriDetail::pluck('no_induk');

            $data = [
                'tertinggi' => $this->getCapaian($noIndukList, $kodeTertinggi, 'DESC'),
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
