<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Component;

class TierlistMaker extends Component
{
    // Tiers a guardar
    public $tiers = [
        ['nombre' => 'S', 'color' => '#ff7f80', 'entries' => []],
        ['nombre' => 'A', 'color' => '#ffc07f', 'entries' => []],
        ['nombre' => 'B', 'color' => '#ffdf80', 'entries' => []],
        ['nombre' => 'C', 'color' => '#ffff7f', 'entries' => []],
        ['nombre' => 'D', 'color' => '#bfff7f', 'entries' => []],
    ];
    // Heroes disponibles
    public $heroesDisponibles = []; // Lista completa de héroes en el footer

    // Tiers a monstrar
    public $renderTiers = [];
    // Heroes a monstrar en el footer
    public $renderHeroesDisponibles = [];
    // Filtro de renderizado
    public $filtroR  = null;

    public function mount()
    {
        $tank=hero::where('rol','tank')->orderBy('nombre')->get();
        $dps=hero::where('rol','dps')->orderBy('nombre')->get();
        $supp=hero::where('rol','supp')->orderBy('nombre')->get();
        $this->heroesDisponibles = $tank->concat($dps)->concat($supp);
        $this->renderHeroesDisponibles = $this->heroesDisponibles;
        $this->renderTiers = $this->tiers;

    }
    public function filtrarPorRol($filtro = null)
    {
        $this->filtroR = $filtro;
        if ($filtro === null) {
            // Si no hay filtro, mostrar todos los héroes
            $this->renderTiers = $this->tiers;
            // Mostrar todos los héroes en el footer
            $this->renderHeroesDisponibles = $this->heroesDisponibles;
        } else {
            // Filtrar los héroes según el rol seleccionado
            $this->renderTiers = array_map(function ($tier) use ($filtro) {
                $tier['entries'] = array_filter($tier['entries'], function ($entry) use ($filtro) {
                    return $entry['rol'] === $filtro;
                });
                return $tier;
            }, $this->tiers);
            // Filtrar los héroes en el footer
            $this->renderHeroesDisponibles = array_filter($this->heroesDisponibles, function ($hero) use ($filtro) {
                return $hero['rol'] === $filtro;
            });
        }
    }

    public function render()
    {
        return view('tierlist-maker');
    }
}
