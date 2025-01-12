<?php

namespace App\Actions\Dashboard\Quiz;


use App\Models\Quiz;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class DeleteQuizAction
{

    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(Quiz $quiz){
        return DB::transaction(function () use ($quiz){
            $quiz->update($this->deletedBy());
            $quiz->delete();
        });
    }
}
