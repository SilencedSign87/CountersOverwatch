<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{

    public $heroes;
    public $modo;
    public $tierlistGrouped;

    public function mount()
    {
        $this->heroes = hero::all();
        $this->modo = 'verTierlist';
        $this->dispatch('cargaTierlist');

        // Obtener la tierlist específica por nombre (Season 12)
        $tierlist = tierlist::where('nombre', 'Season 12')->first();

        if ($tierlist) {
            // Obtener todos los tiers de la tierlist, con sus entries y héroes
            $this->tierlistGrouped = $tierlist->tiers()->with('entries.hero')->orderBy('posicion', 'asc')->get();
        }
    }

    public function cambiarModo($nuevoModo = 'verTierlist')
    {
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
