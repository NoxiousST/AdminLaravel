<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'judul' => ['required'],
            'tgl' => ['required', 'date'],
            'deskripsi' => ['required'],
            'file1' => ['nullable'],
            'file2' => ['nullable'],
            'file3' => ['nullable'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
