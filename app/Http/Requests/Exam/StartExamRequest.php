<?php

namespace App\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StartExamRequest extends FormRequest
{
    #[ArrayShape(['quiz_id' => "string[]"])]
    public function rules(): array
    {
        return [
            'quiz_id' => ['required','int']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
