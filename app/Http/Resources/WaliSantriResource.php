<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WaliSantriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'noInduk' => $this->no_induk,
            'kode' => $this->kode,
            'nama' => $this->nama,
            'photo' => $this->photo,
            'kelas' => $this->kelas,
            'kelasTahfidz' => $this->kelasTahfidz,
            'tempatLahir' => $this->tempat_lahir,
            'tanggalLahir' => $this->tanggal_lahir,
            'jenisKelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat . ", " . $this->kelurahan . ", " . $this->kecamatan . ", " . $this->nama_kota_kab,
            'namaAyah' => $this->nama_lengkap_ayah,
            'pendidikanAyah' => $this->pendidikan_ayah,
            'pekerjaanAyah' => $this->pekerjaan_ayah,
            'namaIbu' => $this->nama_lengkap_ibu,
            'pendidikanIbu' => $this->pendidikan_ibu,
            'pekerjaanIbu' => $this->pekerjaan_ibu,
            'noHp' => $this->no_hp,
            'kamar' => $this->kamar,
            'namaMurroby' => $this->namaMurroby,
            'fotoMurroby' => $this->fotoMurroby,
            'namaUstadTahfidz' => $this->namaTahfidz,
            'fotoUstadTahfidz' => $this->fotoTahfidz,
            'keuangan'  => [
                'saldo' => $this->saldo,
                'sakuMasuk' => $this->saku_masuk,
                'sakuKeluar' => $this->saku_keluar,
            ]
        ];
    }
}
