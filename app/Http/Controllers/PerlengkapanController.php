<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function index()
    {
        try{
            $data = Perlengkapan::select([
                'perlengkapan.id',
                'santri_detail.nama',
                'perlengkapan.tanggal',
                'perlengkapan.buku AS buku',
                'perlengkapan.buku_layak AS bukuLayak',
                'perlengkapan.pensil AS pensil',
                'perlengkapan.pensil_layak AS pensilLayak',
                'perlengkapan.bolpoin AS bolpoin',
                'perlengkapan.bolpoin_layak AS bolpoinLayak',
                'perlengkapan.penghapus AS penghapus',
                'perlengkapan.penghapus_layak AS penghapusLayak',
                'perlengkapan.penyerut AS penyerut',
                'perlengkapan.penyerut_layak AS penyerutLayak',
                'perlengkapan.penggaris AS penggaris',
                'perlengkapan.penggaris_layak AS penggarisLayak',
                'perlengkapan.box_pensil AS boxPensil',
                'perlengkapan.box_pensil_layak AS boxPensilLayak',
                'perlengkapan.putih AS putih',
                'perlengkapan.putih_layak AS putihLayak',
                'perlengkapan.batik AS batik',
                'perlengkapan.batik_layak AS batikLayak',
                'perlengkapan.coklat AS coklat',
                'perlengkapan.coklat_layak AS coklatLayak',
                'perlengkapan.kerudung AS kerudung',
                'perlengkapan.kerudung_layak AS kerudungLayak',
                'perlengkapan.peci AS peci',
                'perlengkapan.peci_layak AS peciLayak',
                'perlengkapan.kaos_kaki AS kaosKaki',
                'perlengkapan.kaos_kaki_layak AS kaosKakiLayak',
                'perlengkapan.sepatu AS sepatu',
                'perlengkapan.sepatu_layak AS sepatuLayak',
                'perlengkapan.ikat_pinggang AS ikatPinggang',
                'perlengkapan.ikat_pinggang_layak AS ikatPinggangLayak',
                'perlengkapan.mukenah AS mukenah',
                'perlengkapan.mukenah_layak AS mukenahLayak',
                'perlengkapan.al_quran AS alQuran',
                'perlengkapan.al_quran_layak AS alQuranLayak',
                'perlengkapan.jubah_ppatq AS jubahPpatq',
                'perlengkapan.jubah_ppatq_layak AS jubahPpatqLayak',
                'perlengkapan.baju_hijau_stel AS bajuHijauStel',
                'perlengkapan.baju_hijau_stel_layak AS bajuHijauStelLayak',
                'perlengkapan.baju_ungu_stel AS bajuUnguStel',
                'perlengkapan.baju_ungu_stel_layak AS bajuUnguStelLayak',
                'perlengkapan.baju_merah_stel AS bajuMerahStel',
                'perlengkapan.baju_merah_stel_layak AS bajuMerahStelLayak',
                'perlengkapan.kaos_hijau_stel AS kaosHijauStel',
                'perlengkapan.kaos_merah_stel_layak AS kaosMerahStelLayak',
                'perlengkapan.kaos_ungu_stel AS kaosUnguStel',
                'perlengkapan.kaos_ungu_stel_layak AS kaosUnguStelLayak',
                'perlengkapan.kaos_kuning_stel AS kaosKuningStel',
                'perlengkapan.kaos_kuning_stel_layak AS kaosKuningStelLayak',
                'perlengkapan.sabun AS sabun',
                'perlengkapan.sabun_layak AS sabunLayak',
                'perlengkapan.shampo AS shampo',
                'perlengkapan.shampo_layak AS shampoLayak',
                'perlengkapan.sikat AS sikat',
                'perlengkapan.sikat_layak AS sikatLayak',
                'perlengkapan.pasta_gigi AS pastaGigi',
                'perlengkapan.pasta_gigi_layak AS pastaGigiLayak',
                'perlengkapan.kotak_sabun AS kotakSabun',
                'perlengkapan.kotak_sabun_layak AS kotakSabunLayak',
                'perlengkapan.handuk AS handuk',
                'perlengkapan.handuk_layak AS handukLayak',
                'perlengkapan.kasur AS kasur',
                'perlengkapan.kasur_layak AS kasurLayak',
                'perlengkapan.bantal AS bantal',
                'perlengkapan.bantal_layak AS bantalLayak',
                'perlengkapan.guling AS guling',
                'perlengkapan.guling_layak AS gulingLayak',
                'perlengkapan.sarung_bantal AS sarungBantal',
                'perlengkapan.sarung_banta_layakl AS sarungBantalLayak',
                'perlengkapan.sarung_guling AS sarungGuling',
                'perlengkapan.sarung_guling_layak AS sarungGulingLayak',
                'perlengkapan.sandal AS sandal',
                'perlengkapan.sandal_layak AS sandalLayak',
                'perlengkapan.keterangan AS keterangan',
                'employee_new.nama AS namaPengisi'
            ])
            ->leftJoin('santri_detail', 'santri_detail.no_induk', '=', 'perlengkapan.no_induk')
            ->leftJoin('users', 'users.id', '=', 'perlengkapan.by_id')
            ->leftJoin('employee_new', 'employee_new.id', '=', 'users.pegawai_id')
            ->get()
            ->map(function($item){
                $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('d F Y');

                $item->buku = match ($item->buku) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bukuLayak = match ($item->bukuLayak) { // Note: Changed to $item->bukuLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->pensil = match ($item->pensil) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->pensilLayak = match ($item->pensilLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bolpoin = match ($item->bolpoin) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bolpoinLayak = match ($item->bolpoinLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penghapus = match ($item->penghapus) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penghapusLayak = match ($item->penghapusLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penyerut = match ($item->penyerut) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penyerutLayak = match ($item->penyerutLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->penggaris = match ($item->penggaris) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->penggarisLayak = match ($item->penggarisLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->boxPensil = match ($item->boxPensil) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->boxPensilLayak = match ($item->boxPensilLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->putih = match ($item->putih) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->putihLayak = match ($item->putihLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->batik = match ($item->batik) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->batikLayak = match ($item->batikLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->coklat = match ($item->coklat) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->coklatLayak = match ($item->coklatLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kerudung = match ($item->kerudung) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kerudungLayak = match ($item->kerudungLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->peci = match ($item->peci) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->peciLayak = match ($item->peciLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosKaki = match ($item->kaosKaki) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosKakiLayak = match ($item->kaosKakiLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sepatu = match ($item->sepatu) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sepatuLayak = match ($item->sepatuLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->ikatPinggang = match ($item->ikatPinggang) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->ikatPinggangLayak = match ($item->ikatPinggangLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->mukenah = match ($item->mukenah) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->mukenahLayak = match ($item->mukenahLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->alQuran = match ($item->alQuran) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->alQuranLayak = match ($item->alQuranLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->jubahPpatq = match ($item->jubahPpatq) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->jubahPpatqLayak = match ($item->jubahPpatqLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuHijauStel = match ($item->bajuHijauStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuHijauStelLayak = match ($item->bajuHijauStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuUnguStel = match ($item->bajuUnguStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuUnguStelLayak = match ($item->bajuUnguStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bajuMerahStel = match ($item->bajuMerahStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bajuMerahStelLayak = match ($item->bajuMerahStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosHijauStel = match ($item->kaosHijauStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosMerahStelLayak = match ($item->kaosMerahStelLayak) { // Corrected from kaos_merah_stel to kaosMerahStelLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosUnguStel = match ($item->kaosUnguStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosUnguStelLayak = match ($item->kaosUnguStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kaosKuningStel = match ($item->kaosKuningStel) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kaosKuningStelLayak = match ($item->kaosKuningStelLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sabun = match ($item->sabun) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sabunLayak = match ($item->sabunLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->shampo = match ($item->shampo) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->shampoLayak = match ($item->shampoLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sikat = match ($item->sikat) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sikatLayak = match ($item->sikatLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->pastaGigi = match ($item->pastaGigi) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->pastaGigiLayak = match ($item->pastaGigiLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kotakSabun = match ($item->kotakSabun) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kotakSabunLayak = match ($item->kotakSabunLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->handuk = match ($item->handuk) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->handukLayak = match ($item->handukLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->kasur = match ($item->kasur) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->kasurLayak = match ($item->kasurLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->bantal = match ($item->bantal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->bantalLayak = match ($item->bantalLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->guling = match ($item->guling) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->gulingLayak = match ($item->gulingLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sarungBantal = match ($item->sarungBantal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sarungBantalLayak = match ($item->sarungBantalLayak) { // Corrected from sarung_banta_layakl to sarungBantalLayak
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sarungGuling = match ($item->sarungGuling) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sarungGulingLayak = match ($item->sarungGulingLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                $item->sandal = match ($item->sandal) {
                    0 => "Tidak Punya",
                    1 => "Punya",
                    default => "-"
                };

                $item->sandalLayak = match ($item->sandalLayak) {
                    0 => "Tidak Layak",
                    1 => "Layak",
                    default => "-"
                };

                return $item;
            });
            
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
            $data = [
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'buku' => $request->buku,
                'buku_layak' => $request->bukuLayak,
                'pensil' => $request->pensil,
                'pensil_layak' => $request->pensilLayak,
                'bolpoin' => $request->bolpoin,
                'bolpoin_layak' => $request->bolpoinLayak,
                'penghapus' => $request->penghapus,
                'penghapus_layak' => $request->penghapusLayak,
                'penyerut' => $request->penyerut,
                'penyerut_layak' => $request->penyerutLayak,
                'penggaris' => $request->penggaris,
                'penggaris_layak' => $request->penggarisLayak,
                'box_pensil' => $request->boxPensil,
                'box_pensil_layak' => $request->boxPensilLayak,
                'putih' => $request->putih,
                'putih_layak' => $request->putihLayak,
                'batik' => $request->batik,
                'batik_layak' => $request->batikLayak,
                'coklat' => $request->coklat,
                'coklat_layak' => $request->coklatLayak,
                'kerudung' => $request->kerudung,
                'kerudung_layak' => $request->kerudungLayak,
                'peci' => $request->peci,
                'peci_layak' => $request->peciLayak,
                'kaos_kaki' => $request->kaosKaki,
                'kaos_kaki_layak' => $request->kaosKakiLayak,
                'sepatu' => $request->sepatu,
                'sepatu_layak' => $request->sepatuLayak,
                'ikat_pinggang' => $request->ikatPinggang,
                'ikat_pinggang_layak' => $request->ikatPinggangLayak,
                'mukenah' => $request->mukenah,
                'mukenah_layak' => $request->mukenahLayak,
                'al_quran' => $request->alQuran,
                'al_quran_layak' => $request->alQuranLayak,
                'jubah_ppatq' => $request->jubahPpatq,
                'jubah_ppatq_layak' => $request->jubahPpatqLayak,
                'baju_hijau_stel' => $request->bajuHijauStel,
                'baju_hijau_stel_layak' => $request->bajuHijauStelLayak,
                'baju_ungu_stel' => $request->bajuUnguStel,
                'baju_ungu_stel_layak' => $request->bajuUnguStelLayak,
                'baju_merah_stel' => $request->bajuMerahStel,
                'baju_merah_stel_layak' => $request->bajuMerahStelLayak,
                'kaos_hijau_stel' => $request->kaosHijauStel,
                'kaos_merah_stel_layak' => $request->kaosMerahStelLayak,
                'kaos_ungu_stel' => $request->kaosUnguStel,
                'kaos_ungu_stel_layak' => $request->kaosUnguStelLayak,
                'kaos_kuning_stel' => $request->kaosKuningStel,
                'kaos_kuning_stel_layak' => $request->kaosKuningStelLayak,
                'sabun' => $request->sabun,
                'sabun_layak' => $request->sabunLayak,
                'shampo' => $request->shampo,
                'shampo_layak' => $request->shampoLayak,
                'sikat' => $request->sikat,
                'sikat_layak' => $request->sikatLayak,
                'pasta_gigi' => $request->pastaGigi,
                'pasta_gigi_layak' => $request->pastaGigiLayak,
                'kotak_sabun' => $request->kotakSabun,
                'kotak_sabun_layak' => $request->kotakSabunLayak,
                'handuk' => $request->handuk,
                'handuk_layak' => $request->handukLayak,
                'kasur' => $request->kasur,
                'kasur_layak' => $request->kasurLayak,
                'bantal' => $request->bantal,
                'bantal_layak' => $request->bantalLayak,
                'guling' => $request->guling,
                'guling_layak' => $request->gulingLayak,
                'sarung_bantal' => $request->sarungBantal,
                'sarung_bantal_layak' => $request->sarungBantalLayak,
                'sarung_guling' => $request->sarungGuling,
                'sarung_guling_layak' => $request->sarungGulingLayak,
                'sandal' => $request->sandal,
                'sandal_layak' => $request->sandalLayak,
                'keterangan' => $request->keterangan,
                'by_id' => $request->user()->id 
            ];

            $data = Perlengkapan::create($data);
            
            return response()->json([
                "status"  => 201,
                "message" => "Berhasil membuat data",
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function edit(int $id)
    {
        try{
            $data = Perlengkapan::select([
                'perlengkapan.id',
                'perlengkapan.no_induk AS noInduk',
                'perlengkapan.tanggal',
                'perlengkapan.buku AS buku',
                'perlengkapan.buku_layak AS bukuLayak',
                'perlengkapan.pensil AS pensil',
                'perlengkapan.pensil_layak AS pensilLayak',
                'perlengkapan.bolpoin AS bolpoin',
                'perlengkapan.bolpoin_layak AS bolpoinLayak',
                'perlengkapan.penghapus AS penghapus',
                'perlengkapan.penghapus_layak AS penghapusLayak',
                'perlengkapan.penyerut AS penyerut',
                'perlengkapan.penyerut_layak AS penyerutLayak',
                'perlengkapan.penggaris AS penggaris',
                'perlengkapan.penggaris_layak AS penggarisLayak',
                'perlengkapan.box_pensil AS boxPensil',
                'perlengkapan.box_pensil_layak AS boxPensilLayak',
                'perlengkapan.putih AS putih',
                'perlengkapan.putih_layak AS putihLayak',
                'perlengkapan.batik AS batik',
                'perlengkapan.batik_layak AS batikLayak',
                'perlengkapan.coklat AS coklat',
                'perlengkapan.coklat_layak AS coklatLayak',
                'perlengkapan.kerudung AS kerudung',
                'perlengkapan.kerudung_layak AS kerudungLayak',
                'perlengkapan.peci AS peci',
                'perlengkapan.peci_layak AS peciLayak',
                'perlengkapan.kaos_kaki AS kaosKaki',
                'perlengkapan.kaos_kaki_layak AS kaosKakiLayak',
                'perlengkapan.sepatu AS sepatu',
                'perlengkapan.sepatu_layak AS sepatuLayak',
                'perlengkapan.ikat_pinggang AS ikatPinggang',
                'perlengkapan.ikat_pinggang_layak AS ikatPinggangLayak',
                'perlengkapan.mukenah AS mukenah',
                'perlengkapan.mukenah_layak AS mukenahLayak',
                'perlengkapan.al_quran AS alQuran',
                'perlengkapan.al_quran_layak AS alQuranLayak',
                'perlengkapan.jubah_ppatq AS jubahPpatq',
                'perlengkapan.jubah_ppatq_layak AS jubahPpatqLayak',
                'perlengkapan.baju_hijau_stel AS bajuHijauStel',
                'perlengkapan.baju_hijau_stel_layak AS bajuHijauStelLayak',
                'perlengkapan.baju_ungu_stel AS bajuUnguStel',
                'perlengkapan.baju_ungu_stel_layak AS bajuUnguStelLayak',
                'perlengkapan.baju_merah_stel AS bajuMerahStel',
                'perlengkapan.baju_merah_stel_layak AS bajuMerahStelLayak',
                'perlengkapan.kaos_hijau_stel AS kaosHijauStel',
                'perlengkapan.kaos_merah_stel_layak AS kaosMerahStelLayak',
                'perlengkapan.kaos_ungu_stel AS kaosUnguStel',
                'perlengkapan.kaos_ungu_stel_layak AS kaosUnguStelLayak',
                'perlengkapan.kaos_kuning_stel AS kaosKuningStel',
                'perlengkapan.kaos_kuning_stel_layak AS kaosKuningStelLayak',
                'perlengkapan.sabun AS sabun',
                'perlengkapan.sabun_layak AS sabunLayak',
                'perlengkapan.shampo AS shampo',
                'perlengkapan.shampo_layak AS shampoLayak',
                'perlengkapan.sikat AS sikat',
                'perlengkapan.sikat_layak AS sikatLayak',
                'perlengkapan.pasta_gigi AS pastaGigi',
                'perlengkapan.pasta_gigi_layak AS pastaGigiLayak',
                'perlengkapan.kotak_sabun AS kotakSabun',
                'perlengkapan.kotak_sabun_layak AS kotakSabunLayak',
                'perlengkapan.handuk AS handuk',
                'perlengkapan.handuk_layak AS handukLayak',
                'perlengkapan.kasur AS kasur',
                'perlengkapan.kasur_layak AS kasurLayak',
                'perlengkapan.bantal AS bantal',
                'perlengkapan.bantal_layak AS bantalLayak',
                'perlengkapan.guling AS guling',
                'perlengkapan.guling_layak AS gulingLayak',
                'perlengkapan.sarung_bantal AS sarungBantal',
                'perlengkapan.sarung_banta_layakl AS sarungBantalLayak',
                'perlengkapan.sarung_guling AS sarungGuling',
                'perlengkapan.sarung_guling_layak AS sarungGulingLayak',
                'perlengkapan.sandal AS sandal',
                'perlengkapan.sandal_layak AS sandalLayak',
                'perlengkapan.keterangan AS keterangan'
            ])
            ->where('id', $id)
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
        try {
            $data = Perlengkapan::find($id);

            if (!$data) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            // Update data
            $data->update([
                'no_induk' => $request->noInduk,
                'tanggal' => $request->tanggal,
                'buku' => $request->buku,
                'buku_layak' => $request->bukuLayak,
                'pensil' => $request->pensil,
                'pensil_layak' => $request->pensilLayak,
                'bolpoin' => $request->bolpoin,
                'bolpoin_layak' => $request->bolpoinLayak,
                'penghapus' => $request->penghapus,
                'penghapus_layak' => $request->penghapusLayak,
                'penyerut' => $request->penyerut,
                'penyerut_layak' => $request->penyerutLayak,
                'penggaris' => $request->penggaris,
                'penggaris_layak' => $request->penggarisLayak,
                'box_pensil' => $request->boxPensil,
                'box_pensil_layak' => $request->boxPensilLayak,
                'putih' => $request->putih,
                'putih_layak' => $request->putihLayak,
                'batik' => $request->batik,
                'batik_layak' => $request->batikLayak,
                'coklat' => $request->coklat,
                'coklat_layak' => $request->coklatLayak,
                'kerudung' => $request->kerudung,
                'kerudung_layak' => $request->kerudungLayak,
                'peci' => $request->peci,
                'peci_layak' => $request->peciLayak,
                'kaos_kaki' => $request->kaosKaki,
                'kaos_kaki_layak' => $request->kaosKakiLayak,
                'sepatu' => $request->sepatu,
                'sepatu_layak' => $request->sepatuLayak,
                'ikat_pinggang' => $request->ikatPinggang,
                'ikat_pinggang_layak' => $request->ikatPinggangLayak,
                'mukenah' => $request->mukenah,
                'mukenah_layak' => $request->mukenahLayak,
                'al_quran' => $request->alQuran,
                'al_quran_layak' => $request->alQuranLayak,
                'jubah_ppatq' => $request->jubahPpatq,
                'jubah_ppatq_layak' => $request->jubahPpatqLayak,
                'baju_hijau_stel' => $request->bajuHijauStel,
                'baju_hijau_stel_layak' => $request->bajuHijauStelLayak,
                'baju_ungu_stel' => $request->bajuUnguStel,
                'baju_ungu_stel_layak' => $request->bajuUnguStelLayak,
                'baju_merah_stel' => $request->bajuMerahStel,
                'baju_merah_stel_layak' => $request->bajuMerahStelLayak,
                'kaos_hijau_stel' => $request->kaosHijauStel,
                'kaos_merah_stel_layak' => $request->kaosMerahStelLayak,
                'kaos_ungu_stel' => $request->kaosUnguStel,
                'kaos_ungu_stel_layak' => $request->kaosUnguStelLayak,
                'kaos_kuning_stel' => $request->kaosKuningStel,
                'kaos_kuning_stel_layak' => $request->kaosKuningStelLayak,
                'sabun' => $request->sabun,
                'sabun_layak' => $request->sabunLayak,
                'shampo' => $request->shampo,
                'shampo_layak' => $request->shampoLayak,
                'sikat' => $request->sikat,
                'sikat_layak' => $request->sikatLayak,
                'pasta_gigi' => $request->pastaGigi,
                'pasta_gigi_layak' => $request->pastaGigiLayak,
                'kotak_sabun' => $request->kotakSabun,
                'kotak_sabun_layak' => $request->kotakSabunLayak,
                'handuk' => $request->handuk,
                'handuk_layak' => $request->handukLayak,
                'kasur' => $request->kasur,
                'kasur_layak' => $request->kasurLayak,
                'bantal' => $request->bantal,
                'bantal_layak' => $request->bantalLayak,
                'guling' => $request->guling,
                'guling_layak' => $request->gulingLayak,
                'sarung_bantal' => $request->sarungBantal,
                'sarung_bantal_layak' => $request->sarungBantalLayak,
                'sarung_guling' => $request->sarungGuling,
                'sarung_guling_layak' => $request->sarungGulingLayak,
                'sandal' => $request->sandal,
                'sandal_layak' => $request->sandalLayak,
                'keterangan' => $request->keterangan,
                'by_id' => $request->user()->id,
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengubah data.",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error" => $e->getMessage() // Uncomment jika perlu debugging
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Perlengkapan::find($id);

            if (!$data) {
                return response()->json([
                    "status"  => 404,
                    "message" => "Data tidak ditemukan.",
                ], 404);
            }

            $data->delete();

            return response()->json([
                "status"  => 200,
                "message" => "Data berhasil dihapus.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                // "error" => $e->getMessage() // Aktifkan untuk debug
            ], 500);
        }
    }
}
