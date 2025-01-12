<?php

namespace App\Http\Requests\Exam;

use App\Support\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class AnswerExamQuestionRequest extends FormRequest
{
    #[ArrayShape(['exam_question_id' => "string", 'answer' => "string"])]
    public function rules(): array
    {
        return [
            'exam_question_id' => 'required|integer',
            'answer' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return $this->checkAuth();
    }

    private function checkAuth(): bool
    {
        return (bool)(auth()->check() and auth()->user()->hasRole(RoleEnum::USER) and auth()->user()->can('take.quiz'));
    }
}
