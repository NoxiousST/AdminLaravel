<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriLayananRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'kategori' => ['required'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
