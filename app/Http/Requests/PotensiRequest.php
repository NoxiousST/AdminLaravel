<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PotensiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nama_potensi' => ['nullable'],
            'foto' => ['required'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
