<?php

namespace App\Http\Resources;

use App\Models\Berita;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Berita */
class BeritaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'judul' => $this->judul,
            'tgl' => $this->tgl,
            'deskripsi' => $this->deskripsi,
            'file1' => $this->file1,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('X-Value', 'True');
    }
}
