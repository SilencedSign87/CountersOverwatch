<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{

    public $heroes;
    public $modo,$filtroR;
    public $tierlistGrouped, $tierlist;

    public function mount()
    {
        $this->heroes = hero::all();
        $this->modo = 'verTierlist';
        $this->cargarTierlistActual();
    }

    public function filtrarPorRol($rol = null)
    {
        $this->cargarTierlistActual($rol); // Llama a la tierlist actual con el filtro de rol
    }

    private function cargarTierlistActual($filtro = null)
    {
        $this->filtroR = $filtro;
        // Obtener la tierlist específica por nombre (Season 12)
        $this->tierlist = tierlist::where('nombre', 'Season 12')->first();

        if ($this->tierlist) {
            if (is_null($filtro)) {
                // Obtener todos los tiers con sus entries y héroes, sin filtrar por rol
                $this->tierlistGrouped = $this->tierlist->tiers()
                    ->with(['entries.hero' => function($q) {
                        $q->orderByRaw("FIELD(rol, 'tank', 'dps', 'supp')");
                    }])
                    ->orderBy('posicion', 'asc')
                    ->get();
            } else {
                // Si hay filtro de rol, solo mostrar héroes de ese rol
                $heroesFiltrados = Hero::where('rol', $filtro)->get();
    
                // Filtrar los tiers para que solo incluyan héroes del rol filtrado
                $this->tierlistGrouped = $this->tierlist->tiers()
                    ->with(['entries' => function ($query) use ($heroesFiltrados) {
                        $query->whereIn('hero_id', $heroesFiltrados->pluck('id'));
                    }, 'entries.hero' => function($q) {
                        $q->orderByRaw("FIELD(rol, 'tank', 'dps', 'supp')");
                    }])
                    ->orderBy('posicion', 'asc')
                    ->get();
            }
        }
    }

    public function cambiarModo($nuevoModo = 'verTierlist')
    {
        $this->modo = $nuevoModo;
        if ($nuevoModo === 'verTierlist') {
            $this->cargarTierlistActual();
            $this->dispatch('cargaTierlist');
        } else {
            $this->reset('tierlistGrouped', 'tierlist');
        }
    }

    public function render()
    {
        return view('tierlist-component');
    }
}
