<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegisterUserRequest extends FormRequest
{
    #[ArrayShape(["username" => "string[]", "email" => "string[]", "password" => "string[]", "type" => "string[]", "region_id" => "string[]", "district_id" => "string[]", "role_id" => "string[]"])]
    public function rules(): array
    {
        return [
            "username" => ['required','string', 'unique:users'],
            "email" => ['required','string','unique:users'],
            "password" => ["required","string","min:8"],
            "region_id" => ["required","integer"],
            "district_id" => ["required",'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
