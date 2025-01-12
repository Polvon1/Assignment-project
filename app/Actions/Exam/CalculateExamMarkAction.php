<?php

namespace App\Actions\Exam;

use App\Models\Exam;

class CalculateExamMarkAction
{

    public function execute(Exam $exam): Exam
    {
        $correct_questions_count = $exam->examQuestions()->where('is_correct',true)->count();

        if ($correct_questions_count > 0){
            $exam->mark = $exam->quiz->mark * $correct_questions_count;
            $exam->answers = $correct_questions_count;
        }else{
            $exam->mark = 0;
            $exam->answers = 0;
        }
        $exam->save();
        return $exam;
    }
}
