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
        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get();
        $this->heroesDisponibles = $tank->concat($dps)->concat($supp);
        $this->renderHeroesDisponibles = $this->heroesDisponibles;
        $this->renderTiers = $this->tiers;
    }

    public function filtrarPorRol($filtro = null)
    {
        $this->filtroR = $filtro;

        // Obtener los héroes ya asignados a los tiers
        $heroesInTiers = $this->getHeroesInTiers();

        if ($filtro === null) {
            // Si no hay filtro, mostrar todos los héroes
            $this->renderTiers = $this->tiers;

            // Mostrar héroes disponibles que no estén en los tiers
            $this->renderHeroesDisponibles = $this->heroesDisponibles->filter(function ($hero) use ($heroesInTiers) {
                return !in_array($hero, $heroesInTiers);
            });
        } else {
            // Filtrar los héroes según el rol seleccionado
            $this->renderTiers = array_map(function ($tier) use ($filtro) {
                $tier['entries'] = array_filter($tier['entries'], function ($entry) use ($filtro) {
                    return $entry['rol'] === $filtro;
                });
                return $tier;
            }, $this->tiers);

            // Filtrar los héroes en el footer que no estén en los tiers
            $this->renderHeroesDisponibles = $this->heroesDisponibles->filter(function ($hero) use ($filtro, $heroesInTiers) {
                return $hero->rol === $filtro && !in_array($hero, $heroesInTiers);
            });
        }
    }

    private function getHeroesInTiers()
    {
        $heroesInTiers = [];
        foreach ($this->tiers as $tier) {
            foreach ($tier['entries'] as $entry) {
                $heroesInTiers[] = $entry;  // Agregar el héroe a la lista de héroes ya asignados a tiers
            }
        }
        return $heroesInTiers;
    }

    public function moveHero($sourceTier, $sourceIndex, $targetTier)
    {
        if ($sourceTier === 'available') {
            // Caso 1: El héroe es movido desde el footer (disponibles) a un tier
            $hero = $this->renderHeroesDisponibles[$sourceIndex];

            // Verificar si es una colección antes de convertirla en array
            if ($this->renderHeroesDisponibles instanceof \Illuminate\Support\Collection) {
                $this->renderHeroesDisponibles = $this->renderHeroesDisponibles->toArray();
            }

            // Remover héroe de los disponibles
            unset($this->renderHeroesDisponibles[$sourceIndex]);

            // Reindexar el array de héroes disponibles
            $this->renderHeroesDisponibles = array_values($this->renderHeroesDisponibles);

            // Agregar el héroe al tier de destino
            $this->tiers[$targetTier]['entries'][] = $hero;
        } else {
            // Caso 2: El héroe es movido entre tiers o de un tier al footer
            $hero = $this->tiers[$sourceTier]['entries'][$sourceIndex];
            unset($this->tiers[$sourceTier]['entries'][$sourceIndex]);

            // Reindexar el array de entries en el tier
            $this->tiers[$sourceTier]['entries'] = array_values($this->tiers[$sourceTier]['entries']);

            if ($targetTier !== null) {
                // Si el destino es otro tier, agregar el héroe a ese tier
                $this->tiers[$targetTier]['entries'][] = $hero;
            } else {
                // Verificar si es una colección antes de convertirla en array
                if ($this->renderHeroesDisponibles instanceof \Illuminate\Support\Collection) {
                    $this->renderHeroesDisponibles = $this->renderHeroesDisponibles->toArray();
                }

                // Si el destino es el footer, devolver el héroe a los disponibles
                $this->renderHeroesDisponibles[] = $hero;
            }
        }

        // Actualizar los datos que se renderizan
        $this->renderTiers = $this->tiers;

        // Aplicar el filtro activo después de mover un héroe
        $this->filtrarPorRol($this->filtroR);
    }
    
    public function render()
    {
        return view('tierlist-maker');
    }
}
