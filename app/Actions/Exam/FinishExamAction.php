<?php

namespace App\Actions\Exam;

use App\Models\Exam;
use DB;
use Throwable;

class FinishExamAction
{

    public function __construct(
        private CalculateExamMarkAction $calculateExamMarkAction
    ){}

    /**
     * @throws Throwable
     */
    public function execute(Exam $exam){
        return DB::transaction(function () use($exam):Exam
        {
            $exam->token = null;
            $exam->is_finished = true;
            if ($exam->quiz->is_public)
                $exam->retake = true;
            $exam->save();

            $this->calculateExamMarkAction->execute($exam);

            return $exam;
        });
    }

}
