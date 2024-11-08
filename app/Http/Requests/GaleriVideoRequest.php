<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'link_video' => ['required'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
