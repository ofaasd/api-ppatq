<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaianKemadrasahan;
use App\Models\LaporanBulananKemadrasahan;
use App\Models\RefMapel;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class KemadrasahanController extends Controller
{
    public function getSantri($idUser)
    {
        try {
            $dataUser = User::select([
                    'employee_new.id AS idPegawai',
                    'employee_new.nama AS namaMurroby',
                    'employee_new.photo AS fotoMurroby',
                    'employee_new.alamat AS alamatMurroby',
                    'ref_kelas.code AS kodeKelas'
                ])
                ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
                ->leftJoin('ref_kelas', 'ref_kelas.employee_id', '=', 'employee_new.id')
                ->where('users.id', $idUser)
                ->first();

            $santri = SantriDetail::select([
                    'santri_detail.no_induk AS noInduk',
                    'santri_detail.nama AS namaSantri',
                    'santri_detail.photo AS fotoSantri',
                    'santri_detail.kelas AS kodeKelas'
                ])
                ->where('santri_detail.kelas', $dataUser->kodeKelas)
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => $dataUser,
                    'santri' => $santri
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getDataMapel()
    {
        try {
            $mapel = RefMapel::select([
                'id',
                'nama'
            ])
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $mapel,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

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
                ], 200);
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

    public function store(Request $request)
    {
        // Menggunakan Transaction untuk memastikan data konsisten
        DB::beginTransaction();

        try {
            $kodeKelas = $request->kodeKelas;
            $santri = SantriDetail::select('no_induk')
                ->where('kelas', $kodeKelas)
                ->get();

            $bulan = $request->bulan;
            $semester = $request->semester;
            $idMapel = $request->idMapel;
            $tipeInput = $request->tipeInput; // 'single' atau 'bulk'
            
            if ($tipeInput == 'single') {
                $santri = SantriDetail::select('no_induk')
                    ->where('no_induk', $request->noInduk)->first();

                $laporan = LaporanBulananKemadrasahan::updateOrCreate(
                    [
                        'no_induk' => $santri->no_induk,
                        'bulan'    => $bulan,
                        'semester' => $semester,
                    ],
                    [
                        // Anda bisa menambahkan kolom lain yang perlu diupdate di sini
                        'updated_at' => now(),
                    ]
                );

                DetailPenilaianKemadrasahan::updateOrCreate(
                    [
                        'id_laporan' => $laporan->id,
                        'id_mapel'   => $idMapel,
                        'minggu_ke'  => $request->mingguKe,
                    ],
                    [
                        'id_pengampu'         => $request->user()->id,
                        'materi'              => $request->materi,
                        'deskripsi_penilaian' => $request->deskripsiPenilaian,
                    ]
                );
                
            } else if ($tipeInput == 'bulk') {
                foreach ($santri as $row) {
                    // 1. Update atau Buat Header Laporan
                    $laporan = LaporanBulananKemadrasahan::updateOrCreate(
                        [
                            'no_induk' => $row->no_induk,
                            'bulan'    => $bulan,
                            'semester' => $semester,
                        ],
                        [
                            // Anda bisa menambahkan kolom lain yang perlu diupdate di sini
                            'updated_at' => now(),
                        ]
                    );

                    // 2. Update atau Buat Detail Penilaian (Mencegah Duplikasi Minggu yang Sama)
                    DetailPenilaianKemadrasahan::updateOrCreate(
                        [
                            'id_laporan' => $laporan->id,
                            'id_mapel'   => $idMapel,
                            'minggu_ke'  => $request->mingguKe,
                        ],
                        [
                            'id_pengampu'         => $request->user()->id,
                            'materi'              => $request->materi,
                            'deskripsi_penilaian' => $request->deskripsiPenilaian,
                        ]
                    );
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Data penilaian berhasil disimpan atau diperbarui'
            ], 200);

        } catch (\Exception $e) {
            // Jika ada satu saja yang error, batalkan semua perubahan
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $detail = DetailPenilaianKemadrasahan::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $detail
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan: ' . $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $detail = DetailPenilaianKemadrasahan::findOrFail($id);

            $detail->update([
                'materi' => $request->materi,
                'deskripsi_penilaian' => $request->deskripsiPenilaian,
                'minggu_ke' => $request->mingguKe,
                'id_mapel' => $request->idMapel,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data penilaian berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $detail = DetailPenilaianKemadrasahan::findOrFail($id);
            $detail->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data penilaian berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data: ' . $e->getMessage()
            ], 500);
        }
    }
}
