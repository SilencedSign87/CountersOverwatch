<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{

    public $heroes;
    public $modo, $filtroR;
    public $tierlistGrouped, $tierlist;

    public function mount()
    {
        $this->modo = 'verTierlist';
        $this->cargarTierlistActual();
    }

    public function filtrarPorRol($rol = null)
    {
        $this->filtroR = $rol;

        if ($this->modo === 'hacerTierlist') {
            $this->LoadHeroesMake($rol);
        } else {
            $this->cargarTierlistActual($rol);
        }
    }

    private function cargarTierlistActual($filtro = null)
    {
        // Obtener la tierlist específica por nombre (Season 12)
        $this->tierlist = tierlist::where('nombre', 'Season 12')->first();

        if ($this->tierlist) {
            if (is_null($filtro)) {
                // Obtener todos los tiers con sus entries y héroes, sin filtrar por rol
                $this->tierlistGrouped = $this->tierlist->tiers()
                    ->with(['entries.hero' => function ($q) {
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
                    }, 'entries.hero' => function ($q) {
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
            // $this->dispatch('cargaTierlist');
        } else {
            $this->filtroR = null;
            $this->reset('tierlistGrouped', 'tierlist');
            $this->LoadHeroesMake();
        }
    }

    public function LoadHeroesMake($rol = null)
    {
        if ($rol) {
            $this->heroes = Hero::where('rol', $rol)->orderBy('nombre')->get();
        } else {
            $tank = Hero::where('rol', 'tank')->orderBy('nombre')->get();
            $dps = Hero::where('rol', 'dps')->orderBy('nombre')->get();
            $supp = Hero::where('rol', 'supp')->orderBy('nombre')->get();
            $this->heroes = $tank->concat($dps)->concat($supp);
        }
    }

    public function render()
    {
        return view('tierlist-component');
    }
}
