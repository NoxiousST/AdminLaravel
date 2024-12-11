<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'album' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
