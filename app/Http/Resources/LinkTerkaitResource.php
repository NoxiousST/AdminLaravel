<?php

namespace App\Http\Resources;

use App\Models\LinkTerkait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin LinkTerkait */
class LinkTerkaitResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'link_terkait' => $this->link_terkait,
            'file' => $this->file,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
