<?php

namespace App\Http\Resources;

use App\Models\Unduhan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Unduhan */
class UnduhanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'deskripsi' => $this->deskripsi,
            'file' => $this->file,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'id_kategori' => $this->id_kategori,

            'kategori' => new KategoriUnduhanResource($this->whenLoaded('kategori')),
        ];
    }
}
