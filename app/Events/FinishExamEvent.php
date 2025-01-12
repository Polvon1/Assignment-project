<?php

namespace App\Events;

use App\Models\Exam;
use Illuminate\Foundation\Events\Dispatchable;

class FinishExamEvent
{
    use Dispatchable;

    public function __construct(
        public Exam $exam
    ){}
}
