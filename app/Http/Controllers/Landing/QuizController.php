<?php

namespace App\Http\Controllers\Landing;

use App\Actions\Exam\StartExamAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "<i class='feather icon-home'></i>"],
            ['name' => __('landing.menu.test')]
        ];
        $languages = Language::query()->whereNotIn('slug',['en'])->get();
        $quizzes = Quiz::isPublicFilter(1)->get();
        $categories = Category::isPublicQuery()->get();
        $current_lang = $this->getLanguage();
        return view('landing.pages.quiz.index',compact('languages','quizzes','categories','breadcrumbs','current_lang'));
    }

    public function show(Quiz $quiz, StartExamAction $startExamAction){

        $languages = Language::all();
        $response = $startExamAction->executeCheckExam($quiz);
        $current_lang = $this->getLanguage();
        return view('landing.pages.quiz.show',compact('quiz','response','current_lang','languages'));
    }
}
