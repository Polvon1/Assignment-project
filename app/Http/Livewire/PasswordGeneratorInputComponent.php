<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Str;

class PasswordGeneratorInputComponent extends Component
{
    public string $password;
    public bool $required = true;

    public function generate(){
        $this->password = (string)Str::random();
    }
    public function render(): Factory|View|Application
    {
        return view('livewire.password-generator-input-component');
    }
}
