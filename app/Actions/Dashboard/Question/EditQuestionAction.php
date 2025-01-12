<?php

namespace App\Actions\Dashboard\Question;

use App\DTOs\QuestionDTO;
use App\Models\Question;
use App\Models\Quiz;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class EditQuestionAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(QuestionDTO $data,Quiz $quiz, Question $question): Question
    {
        return DB::transaction(function () use ($data,$quiz,$question): Question{
            $question->update(collect($data->toArray())->merge($this->updatedBy())->toArray());
            return $question;
        });
    }

}
