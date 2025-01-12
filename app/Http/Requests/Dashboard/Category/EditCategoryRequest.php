<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class EditCategoryRequest extends FormRequest
{
    #[ArrayShape(["title" => "string[]", "title.*" => "string[]", "icon" => "string[]", "background" => "string[]"])]
    public function rules(): array
    {
        return [
            "title" => ['required','array','min:1'],
            "title.*" => ['required','string'],
            "icon" => ['nullable','string'],
            "background" => ['nullable','string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
