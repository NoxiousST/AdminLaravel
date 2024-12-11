<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriUnduhanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'kategori' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
