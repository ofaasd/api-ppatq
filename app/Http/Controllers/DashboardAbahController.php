<?php

namespace App\Http\Controllers;

use App\Models\AsetBangunan;
use App\Models\AsetBarang;
use App\Models\AsetElektronik;
use App\Models\AsetRuang;
use App\Models\AsetTanah;
use App\Models\EmployeeNew;
use App\Models\Kurban;
use App\Models\pembayaran;
use App\Models\PsbGelombang;
use App\Models\PsbPesertaOnline;
use App\Models\RefKamar;
use App\Models\RefKelas;
use App\Models\RefTahfidz;
use App\Models\SantriDetail;
use Illuminate\Http\Request;

class DashboardAbahController extends Controller
{
    public function index()
    {
        try{
            $bulan = (int) date('m');
            $tahun = (int) date('Y');

            $gelombang = PsbGelombang::where('pmb_online', 1)->first();
            $qPsb = PsbPesertaOnline::where('gelombang_id', $gelombang->id);
            
            $jumlahPsb = $qPsb->count();
            $jumlahPsbLaki = (clone $qPsb)->where('jenis_kelamin', 'L')->count();
            $jumlahPsbPerempuan = (clone $qPsb)->where('jenis_kelamin', 'P')->count();


            $tahunLalu = $tahun-1;
            $jumlahPsbTahunLalu = PsbPesertaOnline::whereRaw(
                'YEAR(FROM_UNIXTIME(created_at)) = ' . $tahunLalu
            )
            ->count();

            $qSantri = SantriDetail::where('status', 0);
            $jumlahSantri = (clone $qSantri)->count();
            $jumlahSantriLaki = (clone $qSantri)->where('jenis_kelamin', 'L')->count();
            $jumlahSantriPerempuan = (clone $qSantri)->where('jenis_kelamin', 'P')->count();

            $qPegawai = EmployeeNew::get();
            $jumlahPegawai = (clone $qPegawai)->count();
            $jumlahPegawaiLaki = (clone $qPegawai)->where('jenis_kelamin', 'Laki-laki')->count();
            $jumlahPegawaiPerempuan = (clone $qPegawai)->where('jenis_kelamin', 'Perempuan')->count();

            $bayar = pembayaran::whereMonth('tanggal_validasi', $bulan)
            ->whereYear('tanggal_validasi', $tahun)
            ->sum('jumlah');
            $jumlahPembayaran = $bayar;

            $bayar = pembayaran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->sum('jumlah');
            $totalPembayaran = $bayar;

            $jumlahSantriLapor = pembayaran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->distinct('nama_santri');
            $jumlahSantriBelumLapor = $jumlahSantri - $jumlahSantriLapor->count();

            if ($bulan == 1) {
                $bulan = 13;
                $tahun = $tahun - 1;
            }
            $bulanLalu = $bulan - 1;
            $bayarLalu = Pembayaran::whereMonth('tanggal_validasi', $bulanLalu)
            ->whereYear('tanggal_validasi', $tahun)
            ->sum('jumlah');
            $jumlahPembayaranLalu = $bayarLalu;

            $data = [
                'jumlahPsbTahunLalu'               => $jumlahPsbTahunLalu,               // Jumlah total pendaftar PSB (Penerimaan Santri Baru)
                'jumlahPsb'               => $jumlahPsb,               // Jumlah total pendaftar PSB (Penerimaan Santri Baru)
                'jumlahPsbLaki'           => $jumlahPsbLaki,           // Jumlah pendaftar PSB laki-laki
                'jumlahPsbPerempuan'      => $jumlahPsbPerempuan,      // Jumlah pendaftar PSB perempuan
                'jumlahSantri'            => $jumlahSantri,            // Jumlah total santri aktif
                'jumlahSantriLaki'        => $jumlahSantriLaki,        // Jumlah santri laki-laki aktif
                'jumlahSantriPerempuan'   => $jumlahSantriPerempuan,   // Jumlah santri perempuan aktif
                'jumlahPegawai'           => $jumlahPegawai,           // Jumlah total pegawai (guru/karyawan)
                'jumlahPegawaiLaki'       => $jumlahPegawaiLaki,       // Jumlah pegawai laki-laki
                'jumlahPegawaiPerempuan'  => $jumlahPegawaiPerempuan,  // Jumlah pegawai perempuan
                'jumlahPembayaran'        => $jumlahPembayaran,        // Jumlah transaksi pembayaran yang tercatat
                'totalPembayaran'         => $totalPembayaran,         // Total nominal pembayaran yang diterima
                'jumlahSantriBelumLapor'  => $jumlahSantriBelumLapor,  // Jumlah santri yang belum melakukan pelaporan
                'jumlahPembayaranLalu'    => $jumlahPembayaranLalu,    // Jumlah pembayaran pada periode sebelumnya (historis)
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

    public function psb($search = null)
    {
        try {
            $gelombang = PsbGelombang::where('pmb_online', 1)->first();

            $query = PsbPesertaOnline::where('gelombang_id', $gelombang->id)
                ->select([
                    'psb_peserta_online.nama',
                    'psb_peserta_online.jenis_kelamin AS jenisKelamin',
                    'kota_kab_tbl.nama_kota_kab AS asal'
                ])
                ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id', '=', 'psb_peserta_online.kota_id');

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('psb_peserta_online.nama', 'like', "%$search%")
                    ->orWhere('kota_kab_tbl.nama_kota_kab', 'like', "%$search%");
                });
            }

            $dataPsb = $query->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $dataPsb->count(),
                "data"    => $dataPsb
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Hapus di production
            ], 500);
        }
    }

    public function santri($search = null)
    {
        try {
            $query = SantriDetail::select([
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin',
                    'kelas'
                ])
                ->where('status', 0);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                    ->orWhere('kelas', 'like', "%$search%");
                });
            }

            $dataSantri = $query->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $dataSantri->count(),
                "data"    => $dataSantri
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Uncomment untuk debugging
            ], 500);
        }
    }

    public function pegawai($search = null)
    {
        try {
            $query = EmployeeNew::select([
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin'
                ]);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
            }

            $dataPegawai = $query->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $dataPegawai->count(),
                "data"    => $dataPegawai,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
            ], 500);
        }
    }

    public function belumMelaporkan($search = null)
    {
        try {
            $bulan = (int) date('m');
            $tahun = (int) date('Y');

            // Ambil no_induk santri yang sudah membayar
            $santriSudahBayar = Pembayaran::whereMonth('tanggal_bayar', $bulan)
                ->whereYear('tanggal_bayar', $tahun)
                ->distinct()
                ->pluck('nama_santri'); // diasumsikan berisi no_induk

            // Query awal santri yang belum melapor
            $query = SantriDetail::select([
                    'photo',
                    'no_induk AS noInduk',
                    'nama'
                ])
                ->whereNotIn('no_induk', $santriSudahBayar)
                ->where('status', 0);

            // Tambahkan filter jika ada pencarian
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                    ->orWhere('no_induk', 'like', "%$search%");
                });
            }

            $dataBelumLapor = $query->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $dataBelumLapor->count(),
                "data"    => $dataBelumLapor
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
            ], 500);
        }
    }

    public function pembayaranValidBulanIni()
    {
        try{
            $bulan = (int) date('m');
            $tahun = (int) date('Y');

            $bayarValid = pembayaran::select([
                'nama_santri AS noInduk',
                'santri_detail.nama AS namaSantri',
                'tb_pembayaran.jumlah',
                'tb_pembayaran.catatan',
                'tb_pembayaran.atas_nama AS atasNama',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'tb_pembayaran.nama_santri')
            ->whereMonth('tanggal_validasi', $bulan)
            ->whereYear('tanggal_validasi', $tahun)
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"    => $bayarValid->count(),
                "data"    => $bayarValid
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function pembayaranBulanLalu()
    {
        try{
            $bulan = (int) date('m');
            $tahun = (int) date('Y');

            if ($bulan == 1) {
                $bulan = 13;
                $tahun = $tahun - 1;
            }
            $bulanLalu = $bulan - 1;

            $bayarBulanLalu = Pembayaran::select([
                'nama_santri AS noInduk',
                'santri_detail.nama AS namaSantri',
                'tb_pembayaran.jumlah',
                'tb_pembayaran.catatan',
                'tb_pembayaran.atas_nama AS atasNama',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'tb_pembayaran.nama_santri')
            ->whereMonth('tanggal_validasi', $bulanLalu)
            ->whereYear('tanggal_validasi', $tahun)
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"    => $bayarBulanLalu->count(),
                "data"    => $bayarBulanLalu
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function kamar($search = null)
    {
        try {
            $query = RefKamar::select(
                    'ref_kamar.id',
                    'ref_kamar.name AS namaKamar',
                    'employee_new.nama AS murroby'
                )
                ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id');

            // Jika ada parameter pencarian
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ref_kamar.name', 'like', "%$search%")
                    ->orWhere('employee_new.nama', 'like', "%$search%");
                });
            }

            // Sorting: nama kamar 1A - 10B
            $query->orderByRaw("CAST(SUBSTRING(ref_kamar.name, 1, LENGTH(ref_kamar.name) - 1) AS UNSIGNED) ASC")
                ->orderByRaw("SUBSTRING(ref_kamar.name, -1) ASC");

            $dataKamar = $query->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $dataKamar->count(),
                "data"    => $dataKamar
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
            ], 500);
        }
    }

    public function showKamar($id)
    {
        try {
            $data = SantriDetail::select([
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin',
                ])
                ->where('kamar_id', $id)
                ->get();

            $dataKamar = RefKamar::select([
                'employee_new.nama AS namaMurroby',
                'employee_new.photo AS fotoMurroby',
                'ref_kamar.name AS namaKamar'
            ])
            ->leftJoin('employee_new', 'employee_new.id', 'ref_kamar.employee_id')
            ->where('ref_kamar.id', $id)
            ->first();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $data->count(),
                "data"    => [
                    'dataKamar' => $dataKamar,
                    'santri'    => $data
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function kelas($search = null)
    {
        try{
            $query = RefKelas::select([
                'ref_kelas.code AS kode',
                'ref_kelas.name AS namaKelas',
                'employee_new.nama AS guru',
            ])
            ->leftJoin('employee_new', 'ref_kelas.employee_id','=','employee_new.id');

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

    public function showKelas($kode)
    {
        try {
            $data = SantriDetail::select([
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin',
                ])
                ->where('kelas', $kode)
                ->get();

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
            ], 500);
        }
    }

    public function tahfidz($search = null)
    {
        try{
            $query = RefTahfidz::select([
                'ref_tahfidz.id',
                'ref_tahfidz.name AS namaKelas',
                'employee_new.nama AS guruTahfidz',
            ])
            ->leftJoin('employee_new', 'ref_tahfidz.employee_id', '=', 'employee_new.id');

            // Jika ada parameter pencarian
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ref_tahfidz.name', 'like', "%$search%")
                    ->orWhere('employee_new.nama', 'like', "%$search%");
                });
            }

            $query->orderByRaw("CAST(SUBSTRING(ref_tahfidz.code, 1, LENGTH(ref_tahfidz.code) - 1) AS UNSIGNED) ASC")
                ->orderByRaw("SUBSTRING(ref_tahfidz.code, -1) ASC");
            
            $data = $query->get();

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

    public function showTahfidz($id)
    {
        try {
            $data = SantriDetail::select([
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin',
                ])
                ->where('tahfidz_id', $id)
                ->get();

            $dataTahfidz = RefTahfidz::select([
                'employee_new.nama AS namaGuruTahfidz',
                'employee_new.photo AS fotoGuruTahfidz',
                'ref_tahfidz.name AS namaKelasTahfidz'
            ])
            ->leftJoin('employee_new', 'employee_new.id', 'ref_tahfidz.employee_id')
            ->where('ref_tahfidz.id', $id)
            ->first();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "jumlah"  => $data->count(),
                "data"    => [
                    'dataTahfidz' => $dataTahfidz,
                    'santri'    => $data
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
            ], 500);
        }
    }

    public function aset()
    {
        try{
            $asetRuang = AsetRuang::select([
                'ref_gedung.nama as gedung', 
                'ref_lantai.nama as lantai', 
                'ref_jenis_ruang.nama as jenisRuang', 
                'aset_ruang.nama', 
                ])
            ->leftJoin('ref_gedung', 'ref_gedung.kode', '=', 'aset_ruang.kode_gedung')
            ->leftJoin('ref_lantai', 'ref_lantai.id', '=', 'aset_ruang.id_lantai')
            ->leftJoin('ref_jenis_ruang', 'ref_jenis_ruang.kode', '=', 'aset_ruang.kode_jenis_ruang')
            ->get();

            $asetBarang = AsetBarang::select([
                'aset_ruang.nama as ruang', 
                'ref_jenis_barang.nama as jenisBarang',
                'aset_barang.nama', 
                'aset_barang.status AS statusBarang', 
                ])
            ->leftJoin('ref_jenis_barang', 'ref_jenis_barang.kode', '=', 'aset_barang.kode_jenis_barang')
            ->leftJoin('aset_ruang', 'aset_ruang.kode', '=', 'aset_barang.kode_ruang')
            ->get();
            
            $asetElektronik = AsetElektronik::select([
                'aset_ruang.kode as kodeRuang',
                'aset_ruang.nama as ruang', 
                'aset_elektronik.nama', 
                'aset_elektronik.last_checking AS lastChecking', 
                'aset_elektronik.serial_number AS serialNumber', 
                ])
            ->leftJoin('aset_ruang', 'aset_ruang.kode', '=', 'aset_elektronik.kode_ruang')
            ->get();

            $asetTanah = AsetTanah::select([
                'nama',
                'alamat',
                'luas',
                'no_sertifikat AS noSertifikat',
                'status_tanah AS statusTanah',
            ])->get();

            $asetBangunan = AsetBangunan::select([
                'aset_tanah.nama as tanah', 
                'ref_gedung.nama as gedung', 
                'ref_lantai.nama as lantai',
                'aset_bangunan.nama', 
                'aset_bangunan.luas', 
                'aset_bangunan.status', 
                'aset_bangunan.kondisi', 
                ])
            ->leftJoin('aset_tanah', 'aset_tanah.kode', '=', 'aset_bangunan.kode_tanah')
            ->leftJoin('ref_gedung', 'ref_gedung.kode', '=', 'aset_bangunan.kode_gedung')
            ->leftJoin('ref_lantai', 'ref_lantai.id', '=', 'aset_bangunan.id_lantai')
            ->get();

            $data = [
                'asetRuang' => $asetRuang,
                'asetBarang' => $asetBarang,
                'asetElektronik' => $asetElektronik,
                'asetTanah' => $asetTanah,
                'asetBangunan' => $asetBangunan,
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

    public function murroby()
    {
        try{

            $dataMurroby = EmployeeNew::select([
                'photo',
                'nama',
                'jenis_kelamin AS jenisKelamin'
            ])
            ->where('jabatan_new', 12)
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $dataMurroby
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function ustadTahfidz()
    {
        try{

            $dataMurroby = EmployeeNew::select([
                'photo',
                'nama',
                'jenis_kelamin AS jenisKelamin'
            ])
            ->where('jabatan_new', 13)
            ->get();

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $dataMurroby
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function kurban()
    {
        try{

            $dataKurban = Kurban::select([
                'santri_detail.nama AS namaSantri',
                'kurban.atas_nama AS atasNama',
                'kurban.jenis',
                'kurban.tanggal',
            ])
            ->leftJoin('santri_detail', 'santri_detail.id', 'kurban.id_santri')
            ->get()
            ->map(function ($item) {
                $jenisMapping = [
                    1 => 'Sapi',
                    2 => 'Kambing',
                    3 => 'Domba',
                    4 => 'Lainnya',
                ];

                $item->jenis = $jenisMapping[$item->jenis] ?? 'Tidak Diketahui';
                return $item;
            });

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $dataKurban
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
