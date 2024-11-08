<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required'],
            'pwd' => ['required'],
            'is_admin' => ['required', 'integer'],
            'id_kabupaten' => ['required', 'integer'],
            'fullname' => ['nullable'],
            'NIP' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'telp' => ['nullable'],
            'batas' => ['required', 'integer'],
            'isok' => ['required', 'integer'],
            'deleted' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
