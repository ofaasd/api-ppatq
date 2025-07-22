<?php

namespace App\Http\Controllers;

use App\Models\EmployeeNew;
use App\Models\SantriDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
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
