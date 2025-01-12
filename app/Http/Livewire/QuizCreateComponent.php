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

class QuizCreateComponent extends Component
{

    public Quiz|null $quiz;

    public bool $is_public = false;

    public function render(): Factory|View|Application
    {
        $difficulties = Difficulty::all();
        $categories = Category::all();
        $languages = Language::all();
        return view('livewire.quiz-create-component',compact('difficulties','categories','languages'));
    }
}
