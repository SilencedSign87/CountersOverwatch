<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

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

    // Héroes disponibles en el footer
    public $heroesDisponibles = [];

    // Tiers a mostrar
    public $renderTiers = [];
    public $renderHeroesDisponibles = [];
    public $filtroR = null;

    public function mount()
    {
        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get()->toArray();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get()->toArray();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get()->toArray();

        // Asignar héroes disponibles al footer
        $this->heroesDisponibles = array_merge($tank, $dps, $supp);
        $this->renderHeroesDisponibles = $this->heroesDisponibles; // Ya es un array
        $this->renderTiers = $this->tiers; // Esto ya es un array
    }

    public function filtrarPorRol($filtro = null)
    {
        $this->filtroR = $filtro;
        $heroesInTiers = $this->getHeroesInTiers();

        if ($filtro === null) {
            $this->renderTiers = $this->tiers;

            // Filtrar héroes disponibles que no están en los tiers
            $this->renderHeroesDisponibles = array_filter($this->heroesDisponibles, function ($hero) use ($heroesInTiers) {
                return !in_array($hero, $heroesInTiers);
            });
        } else {
            $this->renderTiers = array_map(function ($tier) use ($filtro) {
                $tier['entries'] = array_filter($tier['entries'], function ($entry) use ($filtro) {
                    return $entry['rol'] === $filtro;
                });
                return $tier;
            }, $this->tiers);

            // Filtrar héroes disponibles según el rol y que no estén en los tiers
            $this->renderHeroesDisponibles = array_filter($this->heroesDisponibles, function ($hero) use ($filtro, $heroesInTiers) {
                return $hero['rol'] === $filtro && !in_array($hero, $heroesInTiers);
            });
        }

        // Reindexar arrays
        $this->renderHeroesDisponibles = array_values($this->renderHeroesDisponibles);
    }

    private function getHeroesInTiers()
    {
        $heroesInTiers = [];
        foreach ($this->tiers as $tier) {
            foreach ($tier['entries'] as $entry) {
                $heroesInTiers[] = $entry;
            }
        }
        return $heroesInTiers;
    }

    public function moveHero($sourceTier, $sourceIndex, $targetTier, $targetIndex = null)
    {
        // Mover desde el footer a un tier
        if ($sourceTier === 'available') {
            $hero = $this->renderHeroesDisponibles[$sourceIndex];
            unset($this->renderHeroesDisponibles[$sourceIndex]);
            $this->renderHeroesDisponibles = array_values($this->renderHeroesDisponibles);

            if ($targetIndex !== null) {
                array_splice($this->tiers[$targetTier]['entries'], $targetIndex, 0, [$hero]);
            } else {
                $this->tiers[$targetTier]['entries'][] = $hero;
            }
        } else {
            // Mover entre tiers
            $hero = $this->tiers[$sourceTier]['entries'][$sourceIndex];
            unset($this->tiers[$sourceTier]['entries'][$sourceIndex]);
            $this->tiers[$sourceTier]['entries'] = array_values($this->tiers[$sourceTier]['entries']);

            if ($targetTier !== null) {
                if ($targetIndex !== null) {
                    array_splice($this->tiers[$targetTier]['entries'], $targetIndex, 0, [$hero]);
                } else {
                    $this->tiers[$targetTier]['entries'][] = $hero;
                }
            } else {
                $this->renderHeroesDisponibles[] = $hero;
            }
        }

        $this->renderTiers = $this->tiers; // Actualizar tiers
        $this->filtrarPorRol($this->filtroR);
    }

    private function recalcularPosiciones($tierIndex)
    {
        foreach ($this->tiers[$tierIndex]['entries'] as $index => $entry) {
            $this->tiers[$tierIndex]['entries'][$index]['posicion'] = $index;
        }
    }

    public function render()
    {
        return view('tierlist-maker');
    }
}
