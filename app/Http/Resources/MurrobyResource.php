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
            'nama' => $this->namaMurroby,
            'photo' => $this->photo,
            // 'token' => $this->token,
        ];
    }
}
