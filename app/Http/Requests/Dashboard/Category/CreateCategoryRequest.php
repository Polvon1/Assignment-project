<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateCategoryRequest extends FormRequest
{
    #[ArrayShape(["title" => "string[]", "language" => "string[]", "icon" => "string[]", "background" => "string[]"])]
    public function rules(): array
    {
        return [
            "title" => ['required','string'],
            "language" => ['required','string'],
            "icon" => ['nullable','string'],
            "background" => ['nullable','string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
