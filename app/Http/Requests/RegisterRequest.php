<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegisterRequest extends FormRequest
{
    #[ArrayShape(["username" => "string[]", "email" => "string[]", "full_name" => "string[]", "phone" => "string[]", "password" => "string[]"])]
    public function rules(): array
    {
        return [
            "username" => ['required','string','unique:users'],
            "email" => ['required','email','unique:users'],
            "full_name" => ['required','string'],
            "phone" => ['required','string'],
            "password" => ['required','string','min:8']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
