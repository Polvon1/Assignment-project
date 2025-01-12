<?php

namespace App\View\Components\Html;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummernoteComponent extends Component
{

    public function __construct(
        public string $name,
        public string $label,
        public ?string $pattern = null,
        public ?string $id = null,
        public ?string $note = null,
        public ?string $value = null,
        public bool $required = true,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.html.summernote-component');
    }
}
