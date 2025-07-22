<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\detailPembayaran;
use App\Models\RefKelas;
use App\Models\Tunggakan;
use App\Models\pembayaran;
use App\Models\RefBank;
use App\Models\SantriDetail;
use App\Models\RefJenisPembayaran;
use App\Models\RefKamar;
use App\Models\UangKeluar;
use App\Models\UangMasuk;

class AbahKeuanganController extends Controller
{
    protected $bulan;
    protected $tahun;

    public function __construct()
    {
        $this->bulan = (int) date('m');
        $this->tahun = (int) date('Y');
    }

    public function catatan()
    {
        try {
            $masuk = UangMasuk::select([
                'tanggal_transaksi AS tanggalTransaksi',
                'sumber',
                'jumlah',
                'nama_kegiatan AS namaKegiatan',
            ])
            ->get()
            ->map(function ($item) {
                $item->tanggalTransaksi = Carbon::parse($item->tanggalTransaksi)->translatedFormat('d F Y');
                $item->jumlah = number_format($item->jumlah, 0, ",", ".");
                return $item;
            });

            $keluar = UangKeluar::select([
                'tanggal_transaksi AS tanggalTransaksi',
                'keterangan',
                'jumlah',
                'nama_kegiatan AS namaKegiatan',
            ])
            ->get()
            ->map(function ($item) {
                $item->tanggalTransaksi = Carbon::parse($item->tanggalTransaksi)->translatedFormat('d F Y');
                $item->jumlah = number_format($item->jumlah, 0, ",", ".");
                return $item;
            });

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => [
                    'masuk' => $masuk,
                    'keluar'   => $keluar,
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

    public function saku($idKamar)
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
                ->where('santri_detail.kamar_id', $idKamar)
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

            $dataKelas = RefKamar::select([
                    'employee_new.nama AS murroby',
                    'employee_new.photo AS fotoMurroby',
                    'ref_kamar.name AS namaKelas'
                ])
                ->leftJoin('employee_new', 'employee_new.id', 'ref_kamar.employee_id')
                ->where('ref_kamar.code', $idKamar)
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

    public function laporBayar()
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $refBayar = RefJenisPembayaran::orderBy('urutan', 'asc')->get();
        $pembayaranList = pembayaran::where('is_hapus', 0)
            ->whereMonth('tanggal_bayar', $this->bulan)
            ->whereYear('tanggal_bayar', $this->tahun)
            ->orderBy('id','desc')
            ->get();

        $detailPembayaran = [];

		foreach ($pembayaranList as $pembayaran) {
            // Inisialisasi semua jenis pembayaran dengan 0
            foreach ($refBayar as $jenis) {
                $detailPembayaran[$pembayaran->id][$jenis->id] = 0;
            }

            // Ambil detail pembayaran dari tabel tb_detail_pembayaran
            $detail = DetailPembayaran::where('id_pembayaran', $pembayaran->id)->get();

            foreach ($detail as $row) {
                $detailPembayaran[$pembayaran->id][$row->id_jenis_pembayaran] = $row->nominal;
            }
        }

        $response = [];

        foreach ($pembayaranList as $row) {
            $dataSantri = SantriDetail::where('no_induk', $row->nama_santri)->first();
            $namaBank = RefBank::where('id', $row->bank_pengirim)->first();
            $baris = [];

            // Atas nama
            $baris['pengirim'] = ($namaBank->nama ?? '-') . ' a/n ' . ($row->atas_nama ?? '-');

            // No WA
            $baris['noWa'] = $row->no_wa ?? '-';

            // Nama Santri
            $baris['namaSantri'] = $dataSantri->nama ?? '-';

            // Kelas
            $baris['kelas'] = strtoupper($dataSantri->kelas) ?? '-';

            // Tanggal bayar
            $baris['tanggalBayar'] = Carbon::parse($row->tanggal_bayar)->translatedFormat('d F Y');

            // Periode
            $baris['periode'] = $bulan[$row->periode] ?? '-';

            // Detail jenis pembayaran
            foreach ($refBayar as $jenis) {
                $nominal = $detailPembayaran[$row->id][$jenis->id] ?? 0;
                $baris['jenisPembayaran'][$jenis->jenis] = number_format($nominal, 0, ",", ".");
            }

            // Validasi
            switch ($row->validasi) {
                case 0:
                    $baris['validasi'] = "Belum di Validasi";
                    break;
                case 1:
                    $baris['validasi'] = "Sudah di Validasi ";
                    break;
                case 2:
                    $baris['validasi'] = "Validasi Ditolak";
                    break;
                default:
                    $baris['validasi'] = "";
            }

            $response[] = $baris;
        }

        $data = collect($response)->groupBy('kelas')->sortKeys();

        return response()->json([
            "status"  => 200,
            "message" => "Berhasil mengambil data",
            "data"    => $data
        ], 200);
    }
}
