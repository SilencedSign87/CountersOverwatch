<?php

namespace App\Components;

use Livewire\Component;

class TierlistMaker extends Component
{

    public $tiers = [];

    public function mount()
    {
        // Carga tiers predefinidos
        $this->tiers = [
            ['nombre' => 'S', 'color' => '#ff7f80', 'entries' => []],  // Dorado
            ['nombre' => 'A', 'color' => '#ffc07f', 'entries' => []],  // Plateado
            ['nombre' => 'B', 'color' => '#ffdf80', 'entries' => []],  // Bronce
            ['nombre' => 'C', 'color' => '#ffff7f', 'entries' => []],  // Tomate
            ['nombre' => 'D', 'color' => '#bfff7f', 'entries' => []],  // Azul acero
        ];
    }

    public function render()
    {
        return view('tierlist-maker');
    }
}
