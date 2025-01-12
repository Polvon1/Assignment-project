<?php

namespace App\DTOs;

use App\Http\Requests\Exam\StartExamRequest;
use App\Models\Quiz;

class ExamDTO extends \Spatie\LaravelData\Data
{


    public function __construct(
        public Quiz $quiz
    ){}


    public static function fromStartExamRequest(StartExamRequest $request): self
    {
        $quiz = Quiz::query()->where('id',$request->input('quiz_id'))->firstOrFail();
        return new self(
            quiz: $quiz
        );
    }
}
