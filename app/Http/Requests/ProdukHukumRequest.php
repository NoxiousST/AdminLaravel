<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukHukumRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_kategori' => ['required', 'integer'],
            'judul' => ['required'],
            'tgl' => ['required', 'date'],
            'deskripsi' => ['required'],
            'file1' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
