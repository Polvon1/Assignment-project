<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryGridComponent extends Component
{
    use WithPagination;

    public int $perPage = 6;

    public string $paginationTheme = 'bootstrap';

    public function render(): Factory|View|Application
    {
        $categories = Category::query()->where('is_public',true)->whereNull('organization_id')->paginate($this->perPage);
        return view('livewire.category-grid-component',compact('categories'));
    }
}
