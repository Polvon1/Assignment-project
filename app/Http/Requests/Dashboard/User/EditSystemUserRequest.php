<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditSystemUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "username" => ['required','string', Rule::unique('users')->ignore($this->user->id ?? 0,'id')],
            "email" => ['required','string',Rule::unique('users')->ignore($this->user->id ?? 0,'id')],
            "password" => ["nullable","string","min:8"],
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
