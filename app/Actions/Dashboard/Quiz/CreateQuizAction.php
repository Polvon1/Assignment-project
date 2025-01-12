<?php

namespace App\Actions\Dashboard\Quiz;

use App\DTOs\QuizDTO;
use App\Models\Quiz;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class CreateQuizAction
{
    use HasAuthorAction;
    /**
     * @throws Throwable
     */
    public function execute(QuizDTO $data): Quiz
    {
        return DB::transaction(function () use ($data): Quiz{
            return Quiz::create(array_merge($data->toArray(),$this->createdBy()));
        });
    }

}
