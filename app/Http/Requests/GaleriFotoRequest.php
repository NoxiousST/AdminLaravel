<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriFotoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'judul' => ['required'],
            'file1' => ['nullable'],
            'file2' => ['nullable'],
            'file3' => ['nullable'],
            'file4' => ['nullable'],
            'file5' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
