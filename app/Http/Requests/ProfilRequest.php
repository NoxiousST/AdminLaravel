<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nama_desa' => ['nullable'],
            'sambutan' => ['required'],
            'profil' => ['required'],
            'visi' => ['required'],
            'misi' => ['required'],
            'tupoksi' => ['required'],
            'sejarah' => ['nullable'],
            'wilayah_desa' => ['nullable'],
            'alamat' => ['nullable'],
            'iframe_maps' => ['nullable'],
            'nomor_telepon' => ['nullable'],
            'file' => ['required'],
            'file2' => ['required'],
            'file3' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
