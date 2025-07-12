<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tahfidz;

use App\Models\EmployeeNew;
use Illuminate\Http\Request;
use App\Models\RefTahunAjaran;
use App\Models\DetailSantriTahfidz;
use App\Models\SantriDetail;

class UstadTahfidzController extends Controller
{
    private function convertNilai($angka)
    {
        if (is_null($angka)) {
            return '-';
        }

        $mapping = [
            4 => 'A',
            3 => 'B',
            2 => 'C',
            1 => 'D',
            0 => 'E',
        ];

        if (!array_key_exists($angka, $mapping)) {
            return '-';
        }

        return $mapping[$angka];
    }

    private function convertBulan($angka)
    {
        $daftarBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $daftarBulan[$angka] ?? "-";
    }

    public function index($idUser)
    {
        try{
            $user = User::where('id', $idUser)->first();
            $tahfidz = Tahfidz::where('employee_id', $user->pegawai_id)->first();
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $detail = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.id',
                'detail_santri_tahfidz.bulan',
                'detail_santri_tahfidz.tahun',
                'santri_detail.nama AS namaSantri',
                'kode_juz.nama AS juz',
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
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'detail_santri_tahfidz.no_induk')
            ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('id_tahfidz', $tahfidz->id)
            ->where('detail_santri_tahfidz.id_tahun_ajaran', $ta->id)
            ->orderBy('detail_santri_tahfidz.created_at', 'desc')
            ->get();

            $detail->transform(function ($item) {
                $item->namaBulan = $this->convertBulan($item->bulan);
                
                $item->hafalan = $this->convertNilai($item->hafalan);
                $item->tilawah = $this->convertNilai($item->tilawah);
                $item->kefasihan = $this->convertNilai($item->kefasihan);
                $item->dayaIngat = $this->convertNilai($item->dayaIngat);
                $item->kelancaran = $this->convertNilai($item->kelancaran);
                $item->praktekTajwid = $this->convertNilai($item->praktekTajwid);
                $item->makhroj = $this->convertNilai($item->makhroj);
                $item->tanafus = $this->convertNilai($item->tanafus);
                $item->waqofWasol = $this->convertNilai($item->waqofWasol);
                $item->ghorib = $this->convertNilai($item->ghorib);
                return $item;
            });

            $data = [
                'idTahfidz' => $tahfidz->id,
                'data' => $detail,
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

    public function store(Request $request)
    {
        try{
            $tanggal = $request->tanggal;
            $bulan = date('m', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));

            $ta = RefTahunAjaran::where('is_aktif', 1)->first();

            // Cek apakah data sudah ada
            $cekData = DetailSantriTahfidz::where('no_induk', $request->noInduk)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->first();

            // Siapkan kondisi update/create
            $kondisi = [];

            if ($cekData && $cekData->id) {
                $kondisi = ['id' => $cekData->id];
            }

            $data = DetailSantriTahfidz::updateOrCreate(
                $kondisi,
                [
                    'id_tahfidz' => $request->idTahfidz,
                    'no_induk' => $request->noInduk,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'tanggal' => $tanggal,
                    'id_tahun_ajaran' => $ta->id,
                    'kode_juz_surah' => $request->kodeJuzSurah,
                    'hafalan' => $request->hafalan,
                    'tilawah' => $request->tilawah,
                    'kefasihan' => $request->kefasihan,
                    'daya_ingat' => $request->dayaIngat,
                    'kelancaran' => $request->kelancaran,
                    'praktek_tajwid' => $request->praktekTajwid,
                    'makhroj' => $request->makhroj,
                    'tanafus' => $request->tanafus,
                    'waqof_wasol' => $request->waqofWasol,
                    'ghorib' => $request->ghorib,
                ]
            );

            return response()->json([
                "status"  => 201,
                "message" => "Berhasil menambahkan tahfidz",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }

    }

    public function listSantri(int $idUser)
    {
        try{
            $user = User::where('id', $idUser)->first();
            $ustadTahfidz = EmployeeNew::where('id', $user->pegawai_id)->first();
            $tahfidz = Tahfidz::where('employee_id', $user->pegawai_id)->first();

            $listSantri = SantriDetail::select([
                    'santri_detail.no_induk',
                    'santri_detail.nama',
                    'santri_detail.kelas',
                    'santri_detail.photo',
                ])
                ->where('tahfidz_id', $tahfidz->id)
                ->get();

            $data = [
                'namaUstad' => $ustadTahfidz->nama,
                'photo' => $ustadTahfidz->photo,
                'kodeTahfidz' => $tahfidz->code,
                'kelas' => $tahfidz->name,
                'listSantri' => $listSantri
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

    public function detailSantri(int $noInduk)
    {
        try{
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $getData = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.bulan',
                'detail_santri_tahfidz.tahun',
                'kode_juz.nama AS juz',
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
            ])
            ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('detail_santri_tahfidz.id_tahun_ajaran', $ta->id)
            ->where('detail_santri_tahfidz.no_induk', $noInduk)
            ->orderBy('detail_santri_tahfidz.tahun', 'desc')
            ->orderBy('detail_santri_tahfidz.bulan', 'desc')
            ->get();

            $getData->transform(function ($item) {
                $item->namaBulan = $this->convertBulan($item->bulan);
                
                $item->hafalan = $this->convertNilai($item->hafalan) ?? '-';
                $item->tilawah = $this->convertNilai($item->tilawah) ?? '-';
                $item->kefasihan = $this->convertNilai($item->kefasihan) ?? '-';
                $item->dayaIngat = $this->convertNilai($item->dayaIngat) ?? '-';
                $item->kelancaran = $this->convertNilai($item->kelancaran) ?? '-';
                $item->praktekTajwid = $this->convertNilai($item->praktekTajwid) ?? '-';
                $item->makhroj = $this->convertNilai($item->makhroj) ?? '-';
                $item->tanafus = $this->convertNilai($item->tanafus) ?? '-';
                $item->waqofWasol = $this->convertNilai($item->waqofWasol) ?? '-';
                $item->ghorib = $this->convertNilai($item->ghorib) ?? '-';
                return $item;
            });

            $getProfil = SantriDetail::where('no_induk', $noInduk)->first();

            $data = [
                'namaSantri'    => $getProfil->nama,
                'data'  => $getData
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

    public function edit(int $id)
    {
        try{
            $data = DetailSantriTahfidz::select([
                'detail_santri_tahfidz.id',
                'detail_santri_tahfidz.no_induk AS noInduk',
                'detail_santri_tahfidz.bulan',
                'detail_santri_tahfidz.kode_juz_surah AS kodeJuzSurah',
                'detail_santri_tahfidz.tanggal',
                'detail_santri_tahfidz.hafalan',
                'detail_santri_tahfidz.kefasihan',
                'detail_santri_tahfidz.tilawah',
                'detail_santri_tahfidz.daya_ingat AS dayaIngat',
                'detail_santri_tahfidz.kelancaran',
                'detail_santri_tahfidz.praktek_tajwid AS praktekTajwid',
                'detail_santri_tahfidz.makhroj',
                'detail_santri_tahfidz.tanafus',
                'detail_santri_tahfidz.waqof_wasol AS waqofWasol',
                'detail_santri_tahfidz.ghorib',
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'detail_santri_tahfidz.no_induk')
            ->leftJoin('kode_juz', 'kode_juz.kode', '=', 'detail_santri_tahfidz.kode_juz_surah')
            ->where('detail_santri_tahfidz.id', $id)
            ->first();
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

    public function update(Request $request, $id)
    {
        try{
            $tanggal = $request->tanggal;
            $bulan = date('m', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));
            $ta = RefTahunAjaran::where('is_aktif', 1)->first();
            $data = DetailSantriTahfidz::where('id', $id)->first();
            $data->update([
                'id_tahfidz' => $request->idTahfidz,
                'no_induk' => $request->noInduk,
                'bulan' => $request->$bulan,
                'tahun' => $request->$tahun,
                'tanggal' => $request->tanggal,
                'id_tahun_ajaran' => $ta->id,
                'kode_juz_surah' => $request->kodeJuzSurah,
                'hafalan' => $request->hafalan,
                'tilawah' => $request->tilawah,
                'kefasihan' => $request->kefasihan,
                'daya_ingat' => $request->dayaIngat,
                'kelancaran' => $request->kelancaran,
                'praktek_tajwid' => $request->praktekTajwid,
                'makhroj' => $request->makhroj,
                'tanafus' => $request->tanafus,
                'waqof_wasol' => $request->waqofWasol,
                'ghorib' => $request->ghorib,
            ]);

            return response()->json([
                "status"  => 200,
                "message" => "Berhasil mengubah data.",
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function delete(string $id)
    {
        try{
            $data = DetailSantriTahfidz::where('id', $id)->delete();
            return response()->json([
                "status"  => 200,
                "message" => "Berhasil menghapus data",
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
