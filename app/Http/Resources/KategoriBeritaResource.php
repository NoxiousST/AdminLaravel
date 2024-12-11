<?php

namespace App\Http\Resources;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin KategoriBerita */
class KategoriBeritaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kategori' => $this->kategori,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
