<?php

namespace App\Http\Controllers;

use App\Models\RefKamar;
use App\Models\User;
use App\Models\UangSaku;
use App\Models\SakuMasuk;
use App\Models\SakuKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class UangSakuController extends Controller
{
    public function index($idUser)
    {
        $ta = DB::table('ref_tahun_ajaran')->where('is_aktif', 1)->first();
        $dataUser = DB::table('users')
            ->select([
                'employee_new.id AS idPegawai',
                'employee_new.nama AS namaMurroby',
                'employee_new.photo AS fotoMurroby',
                'ref_kamar.code AS kodeKamar'
            ])
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->leftJoin('ref_kamar', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('users.id', $idUser)
            ->first();

        if(!$dataUser)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data murroby tidak ditemukan',
            ], 404);
        }

        $listSantri = DB::table('ref_kamar')
            ->select([
                'santri_detail.no_induk AS noIndukSantri',
                'santri_detail.nama AS namaSantri',
                'tb_uang_saku.jumlah AS jumlahSaldo',
            ])
            ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
            ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
            ->where('ref_kamar.employee_id', $dataUser->idPegawai)
            ->where('santri_kamar.tahun_ajaran_id', $ta->id)
            ->orderBy('namaSantri', 'asc')
            ->get();

        if(!$listSantri)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data santri tidak ditemukan',
            ], 404);
        }

        $data = [
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  [
                'dataUser' => $dataUser,
                'listSantri'    =>  $listSantri
            ]
        ];

        return response()->json($data, 200);
    }

    public function uangMasuk($noInduk)
    {
        $dataSantri = DB::table('santri_detail')
            ->select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama AS namaSantri',
            ])
            ->where('santri_detail.no_induk', $noInduk)
            ->first();

        $dataUangMasuk = DB::table('tb_saku_masuk')
            ->select([
                DB::raw("
                    CASE tb_saku_masuk.dari
                        WHEN 1 THEN 'Pembayaran Walsan'
                        WHEN 2 THEN 'Kunjungan Walsan'
                        WHEN 3 THEN 'Sisa Bulan Kemarin'
                        ELSE 'Tidak Diketahui'
                    END AS uangAsal
                "),
                'tb_saku_masuk.jumlah AS jumlahMasuk',
                'tb_saku_masuk.tanggal AS tanggalTransaksi',
            ])
            ->where('no_induk', $noInduk)
            ->get();
        
        $data = [
            'dataSantri'    =>  $dataSantri,
            'dataUangMasuk'    =>  $dataUangMasuk,
        ];

        if(!$data)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data uang masuk tidak ditemukan',
            ], 404);
        }
        

        return response()->json([
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  $data,
        ], 200);
    }

    public function storeUangMasuk(Request $request)
    {
        DB::beginTransaction();
        try {
            $jumlah = $request->jumlah;
            $sakuMasuk = SakuMasuk::create([
                'dari' => $request->dari,
                'jumlah' => $jumlah,
                'no_induk' => $request->noInduk,
                'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            ]);
            $saku = UangSaku::where('no_induk', $request->noInduk)->first();
            $updateSaku = UangSaku::find($saku->id);
            $updateSaku->jumlah = $saku->jumlah + $jumlah;
            $updateSaku->save();

            $saldo = $saku->jumlah + $jumlah;
            DB::commit();
            return response()->json('Uang masuk sebesar Rp ' . number_format($jumlah, 0, ',', '.') . ', Saldo Rp ' . number_format($saldo, 0, ',', '.'));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan saat menambah uang saku. Hubungi Faiz ganteng",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function uangKeluar($noInduk)
    {
        $dataSantri = DB::table('santri_detail')
            ->select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.nama AS namaSantri',
            ])
            ->where('santri_detail.no_induk', $noInduk)
            ->first();

        $dataUangKeluar = DB::table('tb_saku_keluar')
            ->select([
                'tb_saku_keluar.jumlah AS jumlahKeluar',
                'tb_saku_keluar.note AS catatan',
                'tb_saku_keluar.tanggal AS tanggalTransaksi',
                'employee_new.nama AS namaMurroby',
            ])
            ->leftJoin('employee_new', 'employee_new.id', 'tb_saku_keluar.pegawai_id')
            ->where('no_induk', $noInduk)
            ->get();
        
        $data = [
            'dataSantri'    =>  $dataSantri,
            'dataUangKeluar'    =>  $dataUangKeluar,
        ];

        if(!$data)
        {
            return response()->json([
                'status'   => 404,
                'message'   => 'Data uang keluar tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status'   => 200,
            'message'   => 'Berhasil mengambil data',
            'data'  =>  $data,
        ], 200);
    }

    public function storeUangKeluar(Request $request)
    {
        if (!empty($request->note)) {
        DB::beginTransaction();
        try {
            $jumlah = $request->jumlah;
            $user = User::where('id', $request->idUser)->first();
            if($request->allKamar)
            {
                $dataKamar = RefKamar::where('employee_id', $user->pegawai_id)
                    ->select([
                        'santri_detail.no_induk AS noIndukSantri',
                        'santri_detail.nama AS namaSantri',
                        'tb_uang_saku.jumlah AS jumlahSaldo',
                    ])
                    ->leftJoin('santri_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
                    ->leftJoin('santri_detail', 'santri_detail.id', '=', 'santri_kamar.santri_id')
                    ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
                    ->get();

                    foreach($dataKamar as $row)
                    {
                        $sakuKeluar = SakuKeluar::create([
                            'pegawai_id' => $user->pegawai_id,
                            'jumlah' => $request->jumlah,
                            'no_induk' => $row->noIndukSantri,
                            'note' => $request->note,
                            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                        ]);
                        $saku = UangSaku::where('no_induk', $row->noInduk)->first();
                        $updateSaku = UangSaku::find($saku->id);
                        $updateSaku->jumlah = $saku->jumlah - $jumlah;
                        $updateSaku->save();
                    }
        
                return response()->json("Semua uang saku santri telah dikurangi sebesar " . number_format($jumlah, 0, ',', '.'));
            }else
            {
                $sakuKeluar = SakuKeluar::create([
                    'pegawai_id' => $user->pegawai_id,
                    'jumlah' => $request->jumlah,
                    'no_induk' => $request->noInduk,
                    'note' => $request->note,
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                ]);
                $saku = UangSaku::where('no_induk', $request->noInduk)->first();
                $updateSaku = UangSaku::find($saku->id);
                $updateSaku->jumlah = $saku->jumlah - $jumlah;
                $updateSaku->save();

                $sisaSaldo = $updateSaku->jumlah;
                return response()->json('Uang keluar sebesar Rp ' . number_format($jumlah, 0, ',', '.') . ', Sisa Saldo Rp ' . number_format($sisaSaldo, 0, ',', '.'));
            }

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
      }
    }
}
