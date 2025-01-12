<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\Quiz\CreateQuizAction;
use App\Actions\Dashboard\Quiz\DeleteQuizAction;
use App\Actions\Dashboard\Quiz\EditQuizAction;
use App\DTOs\QuizDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Quiz\CreateQuizRequest;
use App\Http\Requests\Dashboard\Quiz\EditQuizRequest;
use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Language;
use App\Models\Quiz;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class QuizController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('dashboard.pages.quiz.index');
    }

    public function create(): Factory|View|Application
    {
        return view('dashboard.pages.quiz.create');
    }

    public function store(CreateQuizRequest $request, CreateQuizAction $createQuizAction): RedirectResponse
    {

        try {
            $quiz = $createQuizAction->execute(QuizDTO::fromRequest($request));
            return redirect()->route('dashboard.quiz.show', compact('quiz'))->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function show(Quiz $quiz): Factory|View|Application
    {
        return view('dashboard.pages.quiz.question.index',compact('quiz'));
    }

    public function edit(Quiz $quiz): Factory|View|Application
    {
        return view('dashboard.pages.quiz.edit',compact('quiz'));
    }

    public function update(EditQuizRequest $request, Quiz $quiz,EditQuizAction $editQuizAction): RedirectResponse
    {
        try {
            $quiz = $editQuizAction->execute(QuizDTO::fromRequest($request),$quiz);
            return redirect()
                ->route('dashboard.quiz.show',['quiz' => $quiz])
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function destroy(Quiz $quiz,DeleteQuizAction $deleteQuizAction): RedirectResponse
    {
        try {
            $deleteQuizAction->execute($quiz);
            return redirect()->route('dashboard.quiz.index')
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::DELETE(false));
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::DELETE(false));
        }
    }
}
