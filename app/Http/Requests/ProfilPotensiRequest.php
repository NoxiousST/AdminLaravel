<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilPotensiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_kategori' => ['required', 'integer'],
            'nama_tempat' => ['required'],
            'deskripsi' => ['required'],
            'file1' => ['nullable'],
            'file2' => ['nullable'],
            'file3' => ['nullable'],
            'deleted' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
