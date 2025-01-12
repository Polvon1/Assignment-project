<?php

namespace App\Http\Requests\Dashboard\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'answer' => 'required|string',
            'answer_explain' => 'nullable|string',
            'image' => 'nullable|string',
            'video' => 'nullable|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
