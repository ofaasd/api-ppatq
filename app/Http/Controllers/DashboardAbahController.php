<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Kurban;
use App\Models\Perilaku;
use App\Models\RefKamar;
use App\Models\RefKelas;
use App\Models\AsetRuang;
use App\Models\AsetTanah;
use App\Models\Kesehatan;
use App\Models\RawatInap;
use App\Models\AsetBarang;
use App\Models\pembayaran;
use App\Models\RefTahfidz;
use App\Models\EmployeeNew;
use App\Models\Kelengkapan;
use App\Models\AsetBangunan;
use App\Models\PsbGelombang;
use App\Models\SantriDetail;
use App\Models\TbPemeriksaan;
use App\Models\AsetElektronik;
use App\Models\PsbPesertaOnline;
use App\Models\RefJenisPembayaran;
use App\Models\DetailSantriTahfidz;
use App\Models\detailPembayaran;

class DashboardAbahController extends Controller
{
    private function konversiNilaiHuruf($nilai)
    {
        if ($nilai === null) {
            return '-';
        }

        return match ((int) $nilai) {
            4 => 'A',
            3 => 'B',
            2 => 'C',
            1 => 'D',
            0 => 'E',
            default => '-',
        };
    }
    
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
                    'id',
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

            $dataSantri = $query->paginate(25);

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

    public function detailSantri($noInduk)
    {
        try {
            $dataDiri = SantriDetail::select([
                'santri_detail.no_induk AS noInduk',
                'santri_detail.tanggal_lahir AS tanggalLahir',
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'santri_detail.tempat_lahir AS tempatLahir',
                'santri_detail.jenis_kelamin AS jenisKelamin',
                'santri_detail.alamat',
                'santri_detail.kelurahan',
                'santri_detail.kecamatan',
                'kota_kab_tbl.nama_kota_kab AS kotaKab',
                'santri_detail.nama_lengkap_ayah AS namaAyah',
                'santri_detail.pendidikan_ayah AS pendidikanAyah',
                'santri_detail.pekerjaan_ayah AS pekerjaan Ayah',
                'santri_detail.nama_lengkap_ibu AS namaIbu',
                'santri_detail.pendidikan_ibu AS pendidikanIbu',
                'santri_detail.pekerjaan_ibu AS pekerjaanIbu',
                'santri_detail.no_hp AS noHp',
                'santri_detail.no_va AS noVa',
                'ref_tahfidz.name AS kelasTahfidz',
                'ref_kamar.name AS kamar',
                'murroby.nama AS namaMurroby',
                'murroby.photo AS fotoMurroby',
                'tahfidz.nama AS namaTahfidz',
                'tahfidz.photo AS fotoTahfidz',
            ])
            ->where('santri_detail.no_induk', $noInduk)
            ->leftJoin('kota_kab_tbl', 'kota_kab_tbl.id_kota_kab', '=', 'santri_detail.kabkota')
            ->leftJoin('ref_kamar', 'ref_kamar.id', '=', 'santri_detail.kamar_id')
            ->leftJoin('ref_tahfidz', 'ref_tahfidz.id', '=', 'santri_detail.tahfidz_id')
            ->leftJoin('employee_new AS murroby', 'murroby.id', '=', 'ref_kamar.employee_id')
            ->leftJoin('employee_new AS tahfidz', 'tahfidz.id', '=', 'ref_tahfidz.employee_id')
            ->first();

            if($dataDiri)
            {
                $dataDiri->kelas = strtoupper($dataDiri->kelas);
                $dataDiri->tanggal_lahir = Carbon::parse($dataDiri->tanggal_lahir)->translatedFormat('d F Y');
            }

            $data['dataDiri'] = $dataDiri;

            $data['riwayatSakit'] = Kesehatan::select([
                'tb_kesehatan.sakit AS keluhan',
                'tb_kesehatan.tanggal_sakit AS tanggalSakit',
                'tb_kesehatan.tanggal_sembuh AS tanggalSembuh',
                'tb_kesehatan.keterangan_sakit AS keteranganSakit',
                'tb_kesehatan.keterangan_sembuh AS keteranganSembuh',
                'tb_kesehatan.tindakan',
            ])
            ->orderBy('created_at', 'desc')
            ->where('santri_id',$noInduk)
            ->get()
            ->map(function($item){
                $item->tanggalSakit = Carbon::parse($item->tanggalSakit)->translatedFormat('d F Y');
                $item->tanggalSembuh = Carbon::parse($item->tanggalSembuh)->translatedFormat('d F Y');

                return $item;
            });

            $data['pemeriksaan'] = TbPemeriksaan::select([
                'tb_pemeriksaan.tanggal_pemeriksaan AS tanggalPemeriksaan',
                'tb_pemeriksaan.tinggi_badan AS tinggiBadan',
                'tb_pemeriksaan.berat_badan AS beratBadan',
                'tb_pemeriksaan.lingkar_pinggul AS lingkarPinggul',
                'tb_pemeriksaan.lingkar_dada AS lingkarDada',
                'tb_pemeriksaan.kondisi_gigi AS kondisiGigi',
            ])
            ->orderBy('tanggalPemeriksaan', 'desc')
            ->where('no_induk',$noInduk)
            ->get()
            ->map(function($item){
                $item->tanggalPemeriksaan = Carbon::parse($item->tanggalPemeriksaan)->translatedFormat('d F Y');

                return $item;
            });

            $data['rawatInap'] = RawatInap::select([
                'rawat_inap.tanggal_masuk AS tanggalMasuk',
                'rawat_inap.keluhan',
                'rawat_inap.terapi',
                'rawat_inap.tanggal_keluar AS tanggalKeluar',
            ])
            ->orderBy('tanggalMasuk', 'desc')
            ->where('santri_no_induk',$noInduk)
            ->get()
            ->map(function($item){
                $item->tanggalMasuk = Carbon::parse($item->tanggalMasuk)->translatedFormat('d F Y');

                return $item;
            });

            $ketahfidzan = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.tanggal',
                'detail_santri_tahfidz.hafalan',
                'detail_santri_tahfidz.tilawah',
                'detail_santri_tahfidz.kefasihan',
                'detail_santri_tahfidz.daya_ingat AS dayaIngat',
                'detail_santri_tahfidz.kelancaran',
                'detail_santri_tahfidz.praktek_tajwid AS praktekTajwid',
                'detail_santri_tahfidz.makhroj',
                'detail_santri_tahfidz.tanafus',
                'detail_santri_tahfidz.waqof_wasol AS waqofWasol',
                'detail_santri_tahfidz.ghorib',
                'kode_juz.nama as nmJuz'
            ])
            ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('detail_santri_tahfidz.no_induk', $noInduk)
            ->whereNotNull('kode_juz.nama')
            ->where('kode_juz.nama', '!=', '')
            ->orderBy('detail_santri_tahfidz.tanggal', 'desc')
            ->get()
            ->map(function ($item) {
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->hafalan          = $this->konversiNilaiHuruf($item->hafalan);
                $item->tilawah          = $this->konversiNilaiHuruf($item->tilawah);
                $item->kefasihan        = $this->konversiNilaiHuruf($item->kefasihan);
                $item->dayaIngat        = $this->konversiNilaiHuruf($item->dayaIngat);
                $item->kelancaran       = $this->konversiNilaiHuruf($item->kelancaran);
                $item->praktekTajwid    = $this->konversiNilaiHuruf($item->praktekTajwid);
                $item->makhroj          = $this->konversiNilaiHuruf($item->makhroj);
                $item->tanafus          = $this->konversiNilaiHuruf($item->tanafus);
                $item->waqofWasol       = $this->konversiNilaiHuruf($item->waqofWasol);
                $item->ghorib           = $this->konversiNilaiHuruf($item->ghorib);

                return $item;
            });

            $groupedData = [];
            foreach ($ketahfidzan as $row) {
                $tahun = date('Y', strtotime($row->tanggal));
                $bulan = date('m', strtotime($row->tanggal));

                // Konversi bulan angka ke nama bulan Indonesia
                $bulanNama = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];

                $namaBulan = $bulanNama[$bulan] ?? $bulan;

                // Simpan data dalam array terstruktur per tahun
                $groupedData[$tahun][$namaBulan][] = $row;
            }

            $data['ketahfidzan'] = $groupedData;

            $labelPerilaku = ['Kurang Baik', 'Cukup', 'Baik'];

            $data['perilaku'] = Perilaku::select([
                'perilaku.tanggal',
                'perilaku.ketertiban',
                'perilaku.kebersihan',
                'perilaku.kedisiplinan',
                'perilaku.kerapian',
                'perilaku.kesopanan',
                'perilaku.kepekaan_lingkungan AS kepekaanLingkungan',
                'perilaku.ketaatan_peraturan AS ketaatanPeraturan',
            ])
            ->orderBy('tanggal', 'desc')
            ->where('no_induk', $noInduk)
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

            $labelKelengkapan = ['Tidak Lengkap', 'Lengkap & Kurang baik', 'lengkap & baik'];

            $data['kelengkapan'] = Kelengkapan::select([
                'tanggal',
                'perlengkapan_mandi AS perlengkapanMandi',
                'catatan_mandi AS catatanMandi',
                'peralatan_sekolah AS peralatanSekolah',
                'catatan_sekolah AS catatanSekolah',
                'perlengkapan_diri AS perlengkapanDiri',
                'catatan_diri AS catatanDiri',
            ])
            ->orderBy('tanggal', 'desc')
            ->where('no_induk', $noInduk)
            ->get()
            ->map(function ($item) use ($labelKelengkapan) {
                $item->tanggal = $item->tanggal ? Carbon::parse($item->tanggal)->format('Y-m-d') : '-';

                $item->perlengkapanMandi = $labelKelengkapan[$item->perlengkapanMandi] ?? '-';
                $item->peralatanSekolah = $labelKelengkapan[$item->peralatanSekolah] ?? '-';
                $item->perlengkapanDiri = $labelKelengkapan[$item->perlengkapanDiri] ?? '-';

                return $item;
            });

            $bulan = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];

            $refBayar = RefJenisPembayaran::orderBy('urutan', 'asc')->get();
            $pembayaranList = pembayaran::where([
                'nama_santri' => $noInduk,
                'is_hapus' => 0
                ])
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

            $riwayatBayar = [];

            foreach ($pembayaranList as $pem) {
                $baris = [];

                // Tombol cetak
                // $baris['cetak'] = '<a href="' . url('pembayaran/print_bukti/' . $pem->id) . '" class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>';

                // Tanggal bayar
                $baris['tanggalBayar'] = Carbon::parse($pem->tanggal_bayar)->translatedFormat('d F Y');

                // Nama bulan dari periode
                $baris['periode'] = $bulan[$pem->periode] ?? '-';

                // Detail jenis pembayaran
                foreach ($refBayar as $jenis) {
                    $nominal = $detailPembayaran[$pem->id][$jenis->id] ?? 0;
                    $baris['jenisPembayaran'][$jenis->id] = number_format($nominal, 0, ",", ".");
                }

                // Validasi
                switch ($pem->validasi) {
                    case 0:
                        $baris['validasi'] = "Belum di Validasi";
                        break;
                    case 1:
                        $baris['validasi'] = "Sudah di Validasi";
                        break;
                    case 2:
                        $baris['validasi'] = "Validasi Ditolak";
                        break;
                    default:
                        $baris['validasi'] = "";
                }

                $riwayatBayar[] = $baris;
            }

            $data['jenisPembayaran'] = $refBayar;
            $data['riwayatBayar'] = $riwayatBayar;
            
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
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

    public function pegawai($search = null)
    {
        try {
            $query = EmployeeNew::select([
                    'id',
                    'photo',
                    'nama',
                    'jenis_kelamin AS jenisKelamin'
                ]);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
            }

            $dataPegawai = $query->paginate(25);

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

    public function detailPegawai($idPegawai)
    {
        try {
            $data['dataDiri'] = EmployeeNew::select([
                'employee_new.nama',
                'employee_new.tempat_lahir AS tempatLahir',
                'employee_new.tanggal_lahir AS tanggalLahir',
                'employee_new.jenis_kelamin AS jenisKelamin',
                'employee_new.jabatan_new AS idJabatan',
                'structural_positions.name AS namaJabatan',
                'employee_new.alhafidz',
                'employee_new.alamat',
                'grades.name AS pendidikan',
                'employee_new.pengangkatan',
                'employee_new.lembaga_induk AS lembagaInduk',
                'employee_new.photo',
                'employee_new.photo',
            ])
            ->leftJoin('grades', 'grades.id', 'employee_new.pendidikan')
            ->leftJoin('structural_positions', 'structural_positions.id', 'employee_new.jabatan_new')
            ->where('employee_new.id', $idPegawai)
            ->first();

            if($data['dataDiri'])
            {
                $data['dataDiri']->alhafidz = match ((int) $data['dataDiri']->alhafidz) {
                    1 => 'Alhafidz',
                    0 => '-',
                    default => '-',
                };
            }

            $refKamar = RefKamar::where('employee_id', $idPegawai)->first();
            if($refKamar)
            {
                $data['kemurrobyan'] = SantriDetail::select([
                    'santri_detail.no_induk AS noInduk',
                    'santri_detail.nama',
                    'santri_detail.photo',
                    'santri_detail.kelas',
                    'santri_detail.jenis_kelamin AS jenisKelamin',
                ])
                ->where('kamar_id', $refKamar->id)
                ->get();
            }

            $refTahfidz = RefTahfidz::where('employee_id', $idPegawai)->first();
            if($refTahfidz)
            {
                $data['ketahfidzan'] = SantriDetail::select([
                    'santri_detail.no_induk AS noInduk',
                    'santri_detail.nama',
                    'santri_detail.photo',
                    'santri_detail.kelas',
                    'santri_detail.jenis_kelamin AS jenisKelamin',
                ])
                ->where('tahfidz_id', $refTahfidz->id)
                ->get();
            }

            $refKelas = RefKelas::where('employee_id', $idPegawai)->first();
            if($refKelas)
            {
                $data['kewalian'] = SantriDetail::select([
                    'santri_detail.no_induk AS noInduk',
                    'santri_detail.nama',
                    'santri_detail.photo',
                    'santri_detail.kelas',
                    'santri_detail.jenis_kelamin AS jenisKelamin',
                ])
                ->where('kelas', $refKelas->code)
                ->get();
            }

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengambil data",
                "data"    => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
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
