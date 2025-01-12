<?php

namespace App\Actions\Dashboard\Quiz;

use App\DTOs\QuizDTO;
use App\Models\Quiz;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class EditQuizAction
{
    use HasAuthorAction;
    /**
     * @throws Throwable
     */
    public function execute(QuizDTO $data, Quiz $quiz): Quiz
    {
        return DB::transaction(function () use ($quiz, $data): Quiz {
            $quiz->update(array_merge($data->toArray(),$this->updatedBy()));
            return $quiz;
        });
    }

}
