<?php

namespace App\Http\Requests\Dashboard\User\System;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "username" => ['required','string', Rule::unique('users')->ignore($this->user->id ?? 0,'id')],
            "email" => ['required','string',Rule::unique('users')->ignore($this->user->id ?? 0,'id')],
            "password" => ["nullable","string","min:8"],
            "name" => ["required","string"],
            "document_number" => ["required","string"],
            "phone" => ["required","string"],
            "region_id" => ["required","integer"],
            "district_id" => ["required",'integer'],
            "address" => ['nullable','string'],
            "gender" => ['required','string'],
            "image" => ["nullable",'string'],
            "verify_email" => ['nullable'],
            "verify_phone" => ['nullable'],
            "notification" => ['nullable'],
            "organization_id" => ['nullable','int']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
