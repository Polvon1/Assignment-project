<?php

namespace App\Http\Requests\Dashboard\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateQuizRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'mark' => ['required','numeric'],
            'duration' => ['required','numeric'],
            'description' => ['nullable','string'],
            'show_answer' => ['nullable'],
            'type' => ['nullable','string'],
            'start' => ['nullable'],
            'finish' => [Rule::requiredIf(function (){
                return $this->input('start') !== null;
            })],
            'category_id' => ['required','integer'],
            'language_id' => ['required','string'],
            'difficulty_id' => ['required','numeric'],
            'qty' => ['nullable','integer','min:1']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
