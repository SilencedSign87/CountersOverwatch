<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{

    public $heroes;
    // Modo de la pantalla y filtro de rol
    public $modo, $filtroR;
    // Tierlist de la base de datos
    public $tierlistGrouped, $tierlist;

    // Tierlist vacia para crear
    // Tiers predefinidos
    public $tiers = [];

    public function mount()
    {
        $this->modo = 'verTierlist';
        // Carga tiers predefinidos
        $this->tiers = [
            ['nombre' => 'S', 'color' => '#ff7f80', 'entries' => []],  // Dorado
            ['nombre' => 'A', 'color' => '#ffc07f', 'entries' => []],  // Plateado
            ['nombre' => 'B', 'color' => '#ffdf80', 'entries' => []],  // Bronce
            ['nombre' => 'C', 'color' => '#ffff7f', 'entries' => []],  // Tomate
            ['nombre' => 'D', 'color' => '#bfff7f', 'entries' => []],  // Azul acero
        ];
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

    // Añadir heroes al tier
    public function addHeroToTier($heroId, $tierIndex)
    {
        dd($heroId, $tierIndex);
        $hero = Hero::find($heroId);

        // Evitar duplicados
        foreach ($this->tiers as &$tier) {
            $tier['entries'] = array_filter($tier['entries'], function ($entry) use ($heroId) {
                return $entry['id'] != $heroId;
            });
        }

        // Añadir el héroe al tier seleccionado
        $this->tiers[$tierIndex]['entries'][] = [
            'id' => $hero->id,
            'nombre' => $hero->nombre,
            'img_path' => $hero->img_path,
        ];
    }

    // Guardar Tierlist
    public function guardarTierlist($nombre, $descripcion)
    {
        $tierlist = Tierlist::create([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ]);

        foreach ($this->tiers as $tierIndex => $tier) {
            $newTier = $tierlist->tiers()->create([
                'nombre' => $tier['nombre'],
                'color' => $tier['color'],
                'posicion' => $tierIndex,
            ]);

            foreach ($tier['entries'] as $entry) {
                $newTier->entries()->create([
                    'hero_id' => $entry['id'],
                ]);
            }
        }
    }

    public function render()
    {
        return view('tierlist-component');
    }
}
