<?php

namespace App\Actions\Dashboard\Question;

use App\Models\Question;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class DeleteQuestionAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(Question $question)
    {
        return DB::transaction(function () use ($question){
            $question->update($this->deletedBy());
            $question->delete();
        });
    }
}
