<?php

namespace App\Actions\Exam;

use App\Models\ExamQuestion;

class CheckAnswerAction
{

    public function execute(ExamQuestion $examQuestion, string $answer): ExamQuestion
    {
        $examQuestion->is_correct = (bool)($examQuestion->correct_answer == $answer);
        $examQuestion->answer = $answer;
        $examQuestion->save();

        return $examQuestion;
    }

}
