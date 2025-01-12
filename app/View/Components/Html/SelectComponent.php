<?php

namespace App\View\Components\Html;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SelectComponent extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public Collection $collection,
        public ?string $pattern = null,
        public ?string $id = null,
        public ?string $note = null,
        public ?string $size = null,
        public ?string $value = null,
        public bool $required = true,
        public string $typeInput = "V",
        public string $type = "text",
    )
    {
        if (is_null($this->id)) $this->id = $this->name;
    }


    public function render(): View|Factory|Htmlable|Closure|string|Application
    {
        return view('components.html.select-component');
    }
}
