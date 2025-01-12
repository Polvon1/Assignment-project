<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Language;
use App\Models\Quiz;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class QuizEditComponent extends Component
{
    public Quiz $quiz;

    public bool $is_public = false;

    public function render(): Factory|View|Application
    {
        $difficulties = Difficulty::all();
        $categories = Category::all();
        $languages = Language::all();
        return view('livewire.quiz-edit-component',compact('difficulties','categories','languages'));
    }
}
