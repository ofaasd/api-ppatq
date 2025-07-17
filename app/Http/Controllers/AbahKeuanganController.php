<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RefKelas;
use App\Models\Tunggakan;
use App\Models\pembayaran;
use App\Models\SantriDetail;
use Illuminate\Http\Request;
use App\Models\RefJenisPembayaran;
use Illuminate\Support\Facades\DB;

class AbahKeuanganController extends Controller
{
    protected $bulan;
    protected $tahun;

    public function __construct()
    {
        $this->bulan = (int) date('m');
        $this->tahun = (int) date('Y');
    }
    public function saku($kodeKelas)
    {
        try {
            $rawData = SantriDetail::select([
                    'santri_detail.photo',
                    'santri_detail.nama',
                    'santri_detail.jenis_kelamin AS jenisKelamin',
                    DB::raw('COALESCE(SUM(tb_saku_masuk.jumlah), 0) AS uangMasuk'),
                    DB::raw('COALESCE(SUM(tb_saku_keluar.jumlah), 0) AS uangKeluar'),
                    'tb_uang_saku.jumlah AS saldo',
                    'employee_new.nama AS murroby'
                ])
                ->leftJoin('tb_saku_masuk', 'tb_saku_masuk.no_induk', '=', 'santri_detail.no_induk')
                ->leftJoin('tb_saku_keluar', 'tb_saku_keluar.no_induk', '=', 'santri_detail.no_induk')
                ->leftJoin('tb_uang_saku', 'tb_uang_saku.no_induk', '=', 'santri_detail.no_induk')
                ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
                ->leftJoin('employee_new', 'employee_new.id', 'ref_kamar.employee_id')
                ->where('santri_detail.kelas', $kodeKelas)
                ->groupBy(
                    'santri_detail.photo',
                    'santri_detail.nama',
                    'santri_detail.jenis_kelamin',
                    'tb_uang_saku.jumlah',
                    'employee_new.nama'
                )
                ->get();

            // Format angka dan kelompokkan berdasarkan saldo
            $grouped = [
                'surplus' => [],
                'minus'   => []
            ];

            foreach ($rawData as $item) {
                $item->totalUangMasuk = number_format($item->uangMasuk, 0, ",", ".");
                $item->totalUangKeluar = number_format($item->uangKeluar, 0, ",", ".");
                $item->saldoFormatted = number_format($item->saldo, 0, ",", ".");

                if ($item->saldo < 0) {
                    $grouped['minus'][] = $item;
                } else {
                    $grouped['surplus'][] = $item;
                }
            }

            $dataKelas = RefKelas::select([
                    'employee_new.nama AS namaWaliKelas',
                    'employee_new.photo AS fotoWaliKelas',
                    'ref_kelas.name AS namaKelas'
                ])
                ->leftJoin('employee_new', 'employee_new.id', 'ref_kelas.employee_id')
                ->where('ref_kelas.code', $kodeKelas)
                ->first();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => count($rawData),
                "data"    => [
                    'dataKelas' => $dataKelas,
                    'surplus'   => $grouped['surplus'],
                    'minus'     => $grouped['minus']
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage()
            ], 500);
        }
    }

    public function syahriah($search = null)
    {
        try{

            $jumlahSantri = SantriDetail::where('status', 0)->count();
            $syahriah = RefJenisPembayaran::where('id', 1)->first();
            $perkalianJumlahSyahriah = $syahriah->harga * $jumlahSantri;
            $totalTagihanSyahriah = number_format($perkalianJumlahSyahriah, 0, ',', '.');

            $bayarValid = pembayaran::join('tb_detail_pembayaran', 'tb_pembayaran.id', '=', 'tb_detail_pembayaran.id_pembayaran')
                ->whereMonth('tb_pembayaran.tanggal_validasi', $this->bulan)
                ->whereYear('tb_pembayaran.tanggal_validasi', $this->tahun)
                ->where('tb_detail_pembayaran.id_jenis_pembayaran', 1)
                ->sum('tb_detail_pembayaran.nominal');

            $totalPembayaranValidBulanIni = number_format($bayarValid, 0, ',', '.');

            $bayarUnvalid = pembayaran::join('tb_detail_pembayaran', 'tb_pembayaran.id', '=', 'tb_detail_pembayaran.id_pembayaran')
                ->whereMonth('tb_pembayaran.tanggal_bayar', $this->bulan)
                ->whereYear('tb_pembayaran.tanggal_bayar', $this->tahun)
                ->where('tb_detail_pembayaran.id_jenis_pembayaran', 1)
                ->sum('tb_detail_pembayaran.nominal');

            $totalPembayaranUnvalidBulanIni = number_format($bayarUnvalid, 0, ',', '.');
            
            $tunggakan = Tunggakan::where('tahun', $this->tahun)
            ->where('status', 0)
            ->where('is_hapus', 0)
            ->sum('kekurangan');

            $query = RefKelas::select([
                'ref_kelas.code AS kode',
                'ref_kelas.name AS namaKelas',
            ]);

            // Jika ada parameter pencarian
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ref_kelas.name', 'like', "%$search%")
                    ->orWhere('employee_new.nama', 'like', "%$search%");
                });
            }

            $query->orderByRaw("CAST(SUBSTRING(ref_kelas.code, 1, LENGTH(ref_kelas.code) - 1) AS UNSIGNED) ASC")
                ->orderByRaw("SUBSTRING(ref_kelas.code, -1) ASC");

            $data = $query->get();

            $namaBulan = Carbon::create(null, $this->bulan)->translatedFormat('F');

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => [
                    'bulan'  => $namaBulan,
                    'totalTagihanSyahriah'  => $totalTagihanSyahriah,
                    'totalPembayaranValidBulanIni'  => $totalPembayaranValidBulanIni,
                    'totalPembayaranUnvalidBulanIni'  => $totalPembayaranUnvalidBulanIni,
                    'totalTunggakan'  => $tunggakan,
                    'dataKelas' => $data
                ]
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function detailSyahriah($kode)
    {
        try {
            $bulan = $this->bulan;
            $tahun = $this->tahun;
            // Ambil semua santri di kelas tersebut
            $data = SantriDetail::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.photo',
                'santri_detail.nama',
                'tb_pembayaran.tanggal_bayar AS tanggalBayar',
                'tb_pembayaran.validasi'
            ])
            ->leftJoin('tb_pembayaran', function($join) use ($bulan, $tahun) {
                $join->on('tb_pembayaran.nama_santri', '=', 'santri_detail.no_induk')
                    ->whereMonth('tb_pembayaran.tanggal_bayar', $bulan)
                    ->whereYear('tb_pembayaran.tanggal_bayar', $tahun);
            })
            ->where('santri_detail.kelas', $kode)
            ->get()
            ->map(function ($item) {
                $item->status = is_null($item->tanggalBayar) ? 'Belum Bayar' : 'Sudah Bayar';

                $item->validasi = $item->validasi == 1 ? 'Valid' : 'Belum Valid';

                $item->tanggalBayar = Carbon::parse($item->tanggalBayar)->translatedFormat('d F Y');
                return $item;
            })
            ->groupBy('status');

            // Ambil info kelas dan wali kelas
            $dataKelas = RefKelas::select([
                    'employee_new.nama AS namaWaliKelas',
                    'employee_new.photo AS fotoWaliKelas',
                    'ref_kelas.name AS namaKelas'
                ])
                ->leftJoin('employee_new', 'employee_new.id', 'ref_kelas.employee_id')
                ->where('ref_kelas.code', $kode)
                ->first();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $data->count(),
                "data"    => [
                    'dataKelas' => $dataKelas,
                    'santri'    => $data
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }
}
