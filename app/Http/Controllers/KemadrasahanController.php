<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaianKemadrasahan;
use App\Models\LaporanBulananKemadrasahan;
use App\Models\SantriDetail;
use Illuminate\Http\Request;

class KemadrasahanController extends Controller
{
    public function getData($noInduk)
    {
        try {
            $santri = SantriDetail::select([
                'no_induk AS noInduk',
                'nama',
            ])
            ->where('no_induk', $noInduk)->first();
            $laporan = LaporanBulananKemadrasahan::select([
                'laporan_bulanan_kemadrasahan.id',
                'laporan_bulanan_kemadrasahan.bulan',
                'laporan_bulanan_kemadrasahan.semester',
            ])
            ->where('no_induk', $noInduk)
            ->get()
            ->map(function ($item) {
                $item->bulan = getMonthName($item->bulan);
                $item->detail = DetailPenilaianKemadrasahan::select([
                    'detail_penilaian_kemadrasahan.id',
                    'detail_penilaian_kemadrasahan.materi',
                    'detail_penilaian_kemadrasahan.id_laporan AS idLaporan',
                    'detail_penilaian_kemadrasahan.deskripsi_penilaian AS deskripsiPenilaian',
                    'detail_penilaian_kemadrasahan.minggu_ke AS mingguKe',
                    'employee_new.nama AS pengampu',
                ])
                ->leftJoin('ref_mapel', 'ref_mapel.id', '=', 'detail_penilaian_kemadrasahan.id_mapel')
                ->leftJoin('employee_new', 'employee_new.id', '=', 'detail_penilaian_kemadrasahan.id_pengampu')
                ->where('id_laporan', $item->id)
                ->get();
                return $item;
            });
            $data = [
                'santri' => $santri,
                'laporan' => $laporan,
            ];

            if ($data) {
                return response()->json([
                    'status' => 'success',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Santri not found'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
