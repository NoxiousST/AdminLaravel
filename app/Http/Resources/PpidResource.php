<?php

namespace App\Http\Resources;

use App\Models\Ppid;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Ppid */
class PpidResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_dokumen' => $this->nama_dokumen,
            'file1' => $this->file1,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'id_kategori' => $this->id_kategori,

            'kategori' => new KategoriPpidResource($this->whenLoaded('kategori')),
        ];
    }
}
