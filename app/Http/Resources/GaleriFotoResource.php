<?php

namespace App\Http\Resources;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin GaleriFoto */
class GaleriFotoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'file1' => $this->file1,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'file4' => $this->file4,
            'file5' => $this->file5,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
