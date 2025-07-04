<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helpers_wa;
use App\Models\SakuMasuk;
use App\Models\pembayaran;
use App\Models\SendWA;

use App\Models\DetailSantri;
use Illuminate\Http\Request;
use App\Models\detailPembayaran;
use App\Models\RefJenisPembayaran;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    private function getNamaBulan($angkaBulan)
    {
        $bulan = [
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
            12 => 'Desember'
        ];

        return $bulan[(int)$angkaBulan] ?? 'Bulan tidak valid';
    }

    public function laporBayar(Request $request)
    {
        $data2 = [
            'nama_santri' => $request->noInduk,
            'jumlah' => $request->jumlah,
            'tanggal_bayar' => $request->tanggalBayar,
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'bank_pengirim' => $request->bankPengirim,
            'atas_nama' => $request->atasNama,
            'no_wa' => $request->noWa,
            'is_hapus' => 0,
        ];

        $cek = pembayaran::where($data2)->count();
        $data = [];
        if($cek > 0){
            return response()->json([
                'status'    => 409,
                'message'   => 'Data sudah ada.',
            ], 409);
        }

        $tipePembayaran = $request->tipePembayaran;

        // if($tipePembayaran == "Bank" || $tipePembayaran == "VA")
        // {
        //     $file = $request->file('bukti');
        //     $ekstensi = $file->extension();
        //     if(strtolower($ekstensi) == 'jpg' || strtolower($ekstensi) == 'png' || strtolower($ekstensi) == 'jpeg'){
        //         $filename = date('YmdHis') . $file->getClientOriginalName();

        //         $kompres = Image::make($file)
        //         ->resize(800, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })
        //         ->save('assets/upload/bukti_bayar/' . $filename);

        //     }else{
        //         $filename = date('YmdHis') . $file->getClientOriginalName();
        //         $file->move('assets/upload/bukti_bayar/',$filename);
        //     }
        //     $data = [
        //         'nama_santri' => $request->noInduk,
        //         'jumlah' => $request->jumlah,
        //         'tanggal_bayar' => $request->tanggalBayar,
        //         'periode' => $request->periode,
        //         'tahun' => $request->tahun,
        //         'bank_pengirim' => $request->bankPengirim,
        //         'atas_nama' => $request->atasNama,
        //         'no_wa' => $request->noWa,
        //         'validasi' => 1,
        //         'tanggal_validasi' => now(),
        //         'note_validasi' => $request->catatanValidasi,
        //         'catatan' => $request->catatan,
        //         'tipe' => $tipePembayaran,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'bukti' => $filename,
        //         'input_by' => 3, //input lewat api / aplikasi
        //     ];
        //     $insertPembayaran = pembayaran::insert($data);
        //     $id = DB::getPdo()->lastInsertId();
        //     $jenisPembayaran = $request->jenisPembayaran;
        //     $idJenisPembayaran = $request->idJenisPembayaran;
        //     $totalRincian = 0;

        //     foreach($jenisPembayaran as $key=>$value){
        //         if($value != 0 && !empty($value)){

        //             $dataDetail = [
        //                 'id_pembayaran'=>$id,
        //                 'id_jenis_pembayaran' => $idJenisPembayaran[$key],
        //                 'nominal' => $value,
        //             ];
        //             $query = detailPembayaran::insert($dataDetail);
        //             $totalRincian += $value;
        //         }

        //         if($idJenisPembayaran == 3){
        //             $data_saku = [
        //                 'dari' => 1,
        //                 'jumlah' => $value,
        //                 'tanggal' => $request->tanggalBayar,
        //                 'no_induk' => $request->noInduk,
        //                 'id_pembayaran' => $id,
        //                 'status_pembayaran' => 0
        //             ];
        //             $query2 = SakuMasuk::insert($data_saku);
        //         }
        //     }
        // }else if($tipePembayaran == "Cash")
        // {

        $data = [
            'nama_santri' => $request->noInduk,
            'jumlah' => $request->jumlah,
            'tanggal_bayar' => $request->tanggalBayar,
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'bank_pengirim' => $request->bankPengirim,
            'atas_nama' => $request->atasNama,
            'no_wa' => $request->noWa,
            'note_validasi' => $request->catatanValidasi,
            'catatan' => $request->catatan,
            'tipe' => $request->tipePembayaran,
        ];


        
            $data = [
                'nama_santri' => $request->noInduk,
                'jumlah' => $request->jumlah,
                'tanggal_bayar' => $request->tanggalBayar,
                'periode' => $request->periode,
                'tahun' => $request->tahun,
                'bank_pengirim' => $request->bankPengirim,
                'atas_nama' => $request->atasNama,
                'no_wa' => $request->noWa,
                'validasi' => 1,
                'tanggal_validasi' => now(),
                'note_validasi' => $request->catatanValidasi,
                'catatan' => $request->catatan,
                'tipe' => $tipePembayaran,
                'created_at' => date('Y-m-d H:i:s'),
                'input_by' => 3, //input lewat api / aplikasi
            ];
            $insertPembayaran = pembayaran::insert($data);
            $id = DB::getPdo()->lastInsertId();
            $jenisPembayaran = $request->jenisPembayaran;
            $idJenisPembayaran = $request->idJenisPembayaran;
            $totalRincian = 0;

            foreach($jenisPembayaran as $key=>$value){
                if($value != 0 && !empty($value)){

                    $dataDetail = [
                        'id_pembayaran'=>$id,
                        'id_jenis_pembayaran' => $idJenisPembayaran[$key],
                        'nominal' => $value,
                    ];
                    $query = detailPembayaran::insert($dataDetail);
                    $totalRincian += $value;
                }

                if($idJenisPembayaran == 3){
                    $data_saku = [
                        'dari' => 1,
                        'jumlah' => $value,
                        'tanggal' => $request->tanggalBayar,
                        'no_induk' => $request->noInduk,
                        'id_pembayaran' => $id,
                        'status_pembayaran' => 0
                    ];
                    $query2 = SakuMasuk::insert($data_saku);
                }
            }
        // }else
        // {
        //     return response()->json([
        //         'status' => 400,
        //         'message' => 'Terjadi Kesalahan. Tipe pembayaran tidak diketahui',
        //     ], 400);
        // }

        if($totalRincian != $request->jumlah)
        {
            return response()->json([
                'status'    => 422,
                'message'   => 'Total pembayaran dan rincian pembayaran tidak sama.',
            ], 422);
        }

        $dataSantri = DetailSantri::where('no_induk', $request->noInduk)->first();
        if(!$dataSantri)
        {
            return response()->json([
                "status"    => 404,
                "message"   => "Data Santri tidak ditemukan"
            ],404);
        }

$message = '[     dari mobile PPATQ-RF ku   ]

Dapatkan Aplikasi Mobile Wali Santri
https://new.ppatq-rf.sch.id/app-wali-santri

Yth. Bp/Ibu *' . $request->atasNama . '*, Wali Santri *' . $dataSantri->nama . '* kelas *' . $dataSantri->kelas . '* telah melaporkan pembayaran bulan *' .   $this->getNamaBulan($request->periode) . '* 
Rp. ' . number_format($request->jumlah, 0, ',', '.') . ' rincian sbb : 
';
$jenis = RefJenisPembayaran::orderBy('urutan', 'asc')->get();
$listJenis = [];
foreach($jenis as $row){
	$listJenis[$row->id] = $row->jenis;
}

$detail = detailPembayaran::where('id_pembayaran', $id)->get();
foreach($detail as $row){
	$message .= '• ' . $listJenis[$row->id_jenis_pembayaran] .' sebesar Rp. ' . number_format($row->nominal,0,',','.') . ' 
';

}

					$message .= '
Tunggu beberapa saat, pencatatan akan dilakukan & segera memberikan status pembayaran tersebut.

No. WA konfirmasi di +62 877-6757-2025. 

gunakan dan manfaatkan aplikasi PPATQ-RF ku untuk media pendampingan antara lembaga / pondok dengan wali santri. Update informasi yang tersaji pada aplikasi. 

Mohon maaf, apabila ada kekurangan atau sedikit kekeliruan, karena app ini masih terus dikembangkan untuk disesuaikan dengan kebutuhan semua elemen lembaga civitas PPATQ-RF. 

Untuk itu, maka kami berharap sumbang saran serta laporan temuan problem yang muncul selama penggunaan. Hubungi kami melalui menu saran pada aplikasi di dalam app atau kirim WA di  +62 818-240-102

Informasi mengenai informasi, berita dan detail santri melalui media yang lebih luas, dapat melalui https: www.ppatq-rf.sch.id
';

$message .= '
Kami ucapkan banyak terima kasih kepada (Bp/Ibu) ' . $request->atasNama . ', salam kami kepada keluarga.

Semoga pekerjaan dan usahanya diberikan kelancaran dan menghasilkan Rizqi yang banyak dan berkah, aamiin.

Tertanda Admin Keuangan
';
                
        if($insertPembayaran){

            try {
                $data = [
                    'id_pembayaran' => $id,
                    'nama' => $request->atasNama,
                    'no_wa' => $request->noWa,
                    'pesan' => $message,
                    'tanggal_kirim' => now(),
                ];

                $hasil = SendWA::create($data);
                $sendWa = Helpers_wa::send_wa($data);

                $responseDecoded = json_decode($sendWa, true);

                return response()->json([
                    'status' => 201,
                    'message' => 'Data berhasil dimasukkan',
                    'data' => $responseDecoded
                ], 201);

            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Terjadi kesalahan saat mengirim pesan WA',
                    // 'error' => $e->getMessage() // Boleh di-nonaktifkan di production untuk alasan keamanan
                ], 500);
            }
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan saat menyimpan data',
            ], 500);
        }
    }
}
