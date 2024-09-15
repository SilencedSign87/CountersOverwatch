<?php

namespace App\Components;

use App\Models\Hero;
use Livewire\Component;

class Tierlist extends Component
{

    public $heroes;
    public $modo;

    public function mount()
    {
        $this->heroes = Hero::all();
        $this->modo = 'verTierlist';
        $this->dispatch('cargaTierlist');
    }

    public function cambiarModo($nuevoModo = 'verTierlist'){
        $this->modo = $nuevoModo;
        if ($nuevoModo === 'verTierlist') {
            $this->dispatch('cargaTierlist');
        }
    }

    public function render()
    {
        return view('tierlist-component');
    }
}
