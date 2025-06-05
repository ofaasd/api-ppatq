<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurrobyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->idUser,
            // 'idPegawai' => $this->idPegawai,
            // 'kode' => $this->kode,
            // 'kode_murroby' => $this->kode_murroby,
            'nama' => $this->namaMurroby,
            'photo' => $this->photo,
            // 'no_induk' => $this->no_induk,
            // 'status' => $this->status,
            // 'token' => $this->token,
        ];
    }
}
