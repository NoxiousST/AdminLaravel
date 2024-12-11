<?php

namespace App\Http\Resources;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Profil */
class ProfilResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_desa' => $this->nama_desa,
            'sambutan' => $this->sambutan,
            'profil' => $this->profil,
            'visi' => $this->visi,
            'misi' => $this->misi,
            'tupoksi' => $this->tupoksi,
            'sejarah' => $this->sejarah,
            'wilayah_desa' => $this->wilayah_desa,
            'alamat' => $this->alamat,
            'iframe_maps' => $this->iframe_maps,
            'nomor_telepon' => $this->nomor_telepon,
            'file' => $this->file,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
