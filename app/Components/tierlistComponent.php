<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{

    public $heroes;
    public $modo;
    public $currentTierlist, $tierlistGrouped;

    public function mount()
    {
        $this->heroes = hero::all();
        $this->modo = 'verTierlist';
        $this->dispatch('cargaTierlist');
        
        $tierlist = Tierlist::where('nombre', 'Season 12')->first();
    
        if ($tierlist) {
            $this->currentTierlist = $tierlist->entradas()->with('hero')->orderBy('tier', 'asc')->get();
            
            // Crear un array estructurado que agrupe por tier
            $this->tierlistGrouped = [];
            
            foreach ($this->currentTierlist as $entry) {
                $this->tierlistGrouped[$entry->tier][] = $entry->hero;
            }
        }
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
