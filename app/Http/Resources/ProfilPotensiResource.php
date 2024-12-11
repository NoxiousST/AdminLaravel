<?php

namespace App\Http\Resources;

use App\Models\ProfilPotensi;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ProfilPotensi */
class ProfilPotensiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_tempat' => $this->nama_tempat,
            'deskripsi' => $this->deskripsi,
            'file1' => $this->file1,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'id_kategori' => $this->id_kategori,

            'kategori' => new PotensiResource($this->whenLoaded('kategori')),
        ];
    }
}
