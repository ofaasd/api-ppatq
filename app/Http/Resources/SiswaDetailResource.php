<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nama" => $this->nama,
            "nisn" => $this->nisn,
            "nik" => $this->nik,
            "anak_ke" => $this->anak_ke,
            "tempat_lahir" => $this->tempat_lahir,
            "tanggal_lahir" => $this->tanggal_lahir,
            "usia" => $this->usia,
            "jenis_kelamin" => $this->jenis_kelamin,
            "alamat" => $this->alamat,
            "provinsi" => $this->provinsi,
            "kota" => $this->kota,
            "kelurahan" => $this->kelurahan,
            "kecamatan" => $this->kecamatan,
            "kode_pos" => $this->kode_pos,
            "nik_kk" => $this->nik_kk,
            "nama_ayah" => $this->nama_ayah,
            "pendidikan_ayah" => $this->pendidikan_ayah,
            "pekerjaan_ayah" => $this->pekerjaan_ayah,
            "nama_ibu" => $this->nama_ibu,
            "pendidikan_ibu" => $this->pendidikan_ibu,
            "pekerjaan_ibu" => $this->pekerjaan_ibu,
            "no_hp" => $this->no_hp,
            "foto" => $this->foto,
        ];
    }
}
