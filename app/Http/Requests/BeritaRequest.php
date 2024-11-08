<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id_kategori' => ['required', 'integer'],
            'judul' => ['required'],
            'tgl' => ['required', 'date'],
            'deskripsi' => ['required'],
            'file1' => ['nullable'],
            'file2' => ['nullable'],
            'file3' => ['nullable'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
