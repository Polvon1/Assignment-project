<?php

namespace App\Listeners;

use App\Actions\Exam\FinishExamAction;
use App\Events\FinishExamEvent;
use Throwable;

class FinishAndCalculateExamListener
{
    public function __construct(private FinishExamAction $finishExamAction){}

    /**
     * @throws Throwable
     */
    public function handle(FinishExamEvent $event): void
    {
        $this->finishExamAction->execute($event->exam);
    }
}
