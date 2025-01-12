<?php

namespace App\Actions\Dashboard\Question;

use App\DTOs\QuestionDTO;

use App\Models\Question;
use App\Models\Quiz;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class CreateQuestionAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(QuestionDTO $data,Quiz $quiz): Question
    {
        return DB::transaction(function () use ($data,$quiz): Question {
            $data = collect($data->toArray())
                ->merge($this->createdBy())
                ->merge(['quiz_id' => $quiz->id,'category_id' => $quiz->category_id])
                ->toArray();
            return Question::create($data);
        });
    }

}
