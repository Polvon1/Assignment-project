<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => ['required', 'string'],
            "organization" => ['required', 'string'],
            "region_id" => ['nullable', 'numeric'],
            "users" => ['required', 'numeric'],
            "test_date" => ['required'],
            "email" => ['required', 'email'],
            "phone" => ['required', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
