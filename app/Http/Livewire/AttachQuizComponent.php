<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Language;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AttachQuizComponent extends Component
{
    use WithPagination;

    public User $user;

    public string $search = "";
    public int $category_filter = 0;
    public int $language_filter = 0;
    public int  $difficulty_filter = 0;

    public function attach(Quiz $quiz){
        $this->user->quizzes()->sync($quiz,false);
        $this->resetPage();
    }

    public function detach(Quiz $quiz){
        $this->user->quizzes()->detach($quiz->id);
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        $quizzes = Quiz::initQuery()
            ->attachQuiz()
            ->search($this->search)
            ->difficultyFilter($this->difficulty_filter)
            ->categoryFilter($this->category_filter)
            ->languageFilter($this->language_filter)
            ->get();
        $categories = Category::all();
        $difficulties = Difficulty::all();
        $languages = Language::all();
        return view('livewire.attach-quiz-component',compact('quizzes','categories','difficulties','languages'));
    }
}
