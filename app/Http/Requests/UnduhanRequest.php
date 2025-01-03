<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnduhanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_kategori' => ['required'],
            'deskripsi' => ['required'],
            'file' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
