<?php

namespace App\Http\Requests\Dashboard\User\System;

use Illuminate\Foundation\Http\FormRequest;

class CreateSystemUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "username" => ['required','string', 'unique:users'],
            "email" => ['required','string','unique:users'],
            "password" => ["required","string","min:8"],
            "phone" => ["required","string"],
            "region_id" => ["nullable","integer"],
            "district_id" => ["nullable",'integer'],
            "image" => ["nullable",'string'],
            "verify_email" => ['nullable'],
            "verify_phone" => ['nullable'],
            "role_id" => ['required','integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
