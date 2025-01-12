<?php

namespace App\Http\Controllers\Exam;

use App\Actions\Exam\StartExamAction;
use App\DTOs\ExamDTO;
use App\Events\FinishExamEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Exam\StartExamRequest;
use App\Models\Exam;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Illuminate\Http\RedirectResponse;
use Throwable;

class ExamController extends Controller
{

    public function index(){

    }

    public function start(StartExamRequest $request,StartExamAction $startExamAction){
        try {
            $examResponse = $startExamAction->execute(ExamDTO::fromStartExamRequest($request));

           return ($examResponse->is_valid)
               ? redirect()
                   ->route('exam.app',['exam' => $examResponse->exam->token])
                   ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::CREATE())
               : redirect()
                   ->route('quiz.show',['quiz' => $examResponse->exam->quiz_id])
                   ->with(NotificationTypeEnum::WARNING, NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return redirect()
                ->route('quiz.show',['quiz' => $request->input('quiz_id')])
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function finish(Exam $exam): RedirectResponse
    {
        event(new FinishExamEvent($exam));
        return redirect()->route('quiz.show',['quiz' => $exam->quiz_id]);
    }
}
