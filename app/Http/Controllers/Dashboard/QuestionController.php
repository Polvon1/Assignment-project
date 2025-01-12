<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\Question\CreateQuestionAction;
use App\Actions\Dashboard\Question\DeleteQuestionAction;
use App\Actions\Dashboard\Question\EditQuestionAction;
use App\DTOs\QuestionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Question\QuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Throwable;

class QuestionController extends Controller
{

    public function create(Quiz $quiz)
    {
        return view('dashboard.pages.quiz.question.create',compact('quiz'));
    }

    public function edit(Quiz $quiz, Question $question)
    {
        return view('dashboard.pages.quiz.question.edit',compact('quiz','question'));
    }

    public function store(QuestionRequest $request, Quiz $quiz, CreateQuestionAction $createQuestionAction)
    {
        try {
            $question = $createQuestionAction->execute(QuestionDTO::fromRequest($request),$quiz);
            return redirect()
                ->route('dashboard.quiz.show',['quiz' => $quiz->id])
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            dd($exception);
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function update(QuestionRequest $request,Quiz $quiz, Question $question, EditQuestionAction $editQuestionAction)
    {
        try {
            $question = $editQuestionAction->execute(QuestionDTO::fromRequest($request),$quiz,$question);
            return redirect()
                ->route('dashboard.quiz.show',['quiz' => $quiz->id])
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            dd($exception);
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function destroy(Quiz $quiz, Question $question, DeleteQuestionAction $deleteQuestionAction)
    {
        try {
            $deleteQuestionAction->execute($question);
            return redirect()
                ->route('dashboard.quiz.show',['quiz' => $quiz->id])
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::DELETE(false));
        }
    }
}
