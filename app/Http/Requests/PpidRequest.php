<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PpidRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_kategori' => ['required', 'integer'],
            'nama_dokumen' => ['required'],
            'file1' => ['nullable'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
