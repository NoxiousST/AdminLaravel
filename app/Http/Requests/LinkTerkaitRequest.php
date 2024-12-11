<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkTerkaitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'link_terkait' => ['required'],
            'file' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
