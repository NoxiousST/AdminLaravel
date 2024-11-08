<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriBeritaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'kategori' => ['required'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
