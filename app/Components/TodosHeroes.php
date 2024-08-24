<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Component;

class TodosHeroes extends Component
{
    public $heroes;

    public function mount(){
        $this->heroes=hero::all();
    }

    public function render()
    {
        return view('todos-heroes');
    }
}
