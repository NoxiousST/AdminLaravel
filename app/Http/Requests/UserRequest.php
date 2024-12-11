<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required'],
            'pwd' => ['required', 'min:6'],

            // 'is_admin' => ['required', 'integer'],
            // 'id_kabupaten' => ['required', 'integer'],
            'fullname' => ['nullable', 'string'],
            'NIP' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'telp' => ['nullable', 'string'],
            // 'batas' => ['required', 'integer'],
            // 'isok' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
