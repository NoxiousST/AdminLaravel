<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunningTextRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'running_text' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
