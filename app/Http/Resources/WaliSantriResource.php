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
            'nama' => $this->nama,
            'photo' => $this->photo,
            'kelas' => $this->kelas,
            'kelasTahfidz' => $this->kelasTahfidz,
            'tempatLahir' => $this->tempat_lahir,
            'tanggalLahir' => $this->tanggal_lahir,
            'jenisKelamin' => $this->jenis_kelamin == "L" ? "Laki-Laki" : ($this->jenis_kelamin == "P" ? "Perempuan" : "Tidak diketahui"),
            'alamat' => $this->alamat . ", " . $this->kelurahan . ", " . $this->kecamatan . ", " . $this->asalKota,
            'namaAyah' => $this->nama_lengkap_ayah,
            'pendidikanAyah' => strtoupper($this->pendidikan_ayah),
            'pekerjaanAyah' => $this->pekerjaan_ayah,
            'namaIbu' => $this->nama_lengkap_ibu,
            'pendidikanIbu' => strtoupper($this->pendidikan_ibu),
            'pekerjaanIbu' => $this->pekerjaan_ibu,
            'noHp' => $this->no_hp,
            'noVa' => $this->no_va,
            'kamar' => $this->kamar,
            'namaMurroby' => $this->namaMurroby,
            'fotoMurroby' => $this->fotoMurroby,
            'namaUstadTahfidz' => $this->namaTahfidz,
            'fotoUstadTahfidz' => $this->fotoTahfidz,
            'keuangan'  => [
                'saldo' => $this->saldo,
                'sakuMasuk' => $this->saku_masuk,
                'sakuKeluar' => $this->saku_keluar,
            ],
            'accessToken'   => $this->access_token,
            'expiresIn'   => $this->expires_in,
        ];
    }
}
