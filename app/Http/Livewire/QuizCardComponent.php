<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class QuizCardComponent extends Component
{
    public Quiz $quiz;
    public Category $category;

    public function render(): Factory|View|Application
    {
        return view('livewire.quiz-card-component');
    }
}
