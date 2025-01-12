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
use Livewire\WithPagination;

class QuizIndexComponent extends Component
{

    use WithPagination;

    public string $sortBy = 'id';
    public int $category_filter = 0;
    public int $language_filter = 0;
    public int  $difficulty_filter = 0;
    public int $is_public_filter = -1;

    public string $sortDirection = 'asc';
    public int $perPage = 10;
    public string $search = '';
    public string $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function clearFilter(){
        $this->category_filter = 0;
        $this->difficulty_filter = 0;
        $this->language_filter = 0;
        $this->search = '';
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        $quizzes = Quiz::initQuery()
            ->search($this->search)
            ->categoryFilter($this->category_filter)
            ->difficultyFilter($this->difficulty_filter)
            ->languageFilter($this->language_filter)
            ->isPublicFilter($this->is_public_filter)
            ->paginate($this->perPage);
        $languages = Language::all();
        $categories = Category::query()->get();
        $difficulties = Difficulty::all();
        return view('livewire.quiz-index-component',compact('quizzes','languages','categories','difficulties'));
    }

    public function deleteQuiz(Quiz $quiz){
        $quiz->delete();
        $this->resetPage();
    }

    public function setPerPage(int $perPage){
        $this->perPage = $perPage;
    }

    public function setSortDirection(string $direction){
        if (in_array($direction,['asc','desc'])){
            $this->sortDirection = $direction;
        }
    }
}
