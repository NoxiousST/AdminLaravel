<?php

namespace App\Http\Resources;

use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Potensi */
class PotensiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_potensi' => $this->nama_potensi,
            'foto' => $this->foto,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
