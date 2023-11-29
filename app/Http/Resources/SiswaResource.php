<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kode' => $this->kode,
            'kode_murroby' => $this->kode_murroby,
            'nama' => $this->nama,
            'no_induk' => $this->no_induk,
            'status' => $this->status,
        ];
    }
}
