<?php

namespace App\Http\Resources;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin KategoriArtikel */
class KategoriArtikelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kategori' => $this->kategori,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
