<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "username" => ['required','string', 'unique:users'],
            "email" => ['required','string','unique:users'],
            "password" => ["required","string","min:8"],
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
            "role_id" => ['required','integer'],
            "organization_id" => ['nullable','integer']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
