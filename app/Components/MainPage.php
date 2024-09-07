<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

#[Title('Lista de Counters')]

class MainPage extends Component
{
    public $heroes, $selectedFilter;

    // Para mostrar el heroe
    public $selectedHero = null;

    public $counters, $countereas;

    public $countersByRol = [
        'tank' => [],
        'dps' => [],
        'supp' => []
    ];
    public $countereasByRol = [
        'tank' => [],
        'dps' => [],
        'supp' => []
    ];

    public function mount()
    {
        $this->selectedFilter = 'all';
        $this->todosHeroes();
    }

    public function todosHeroes()
    {
        $this->reset();
        $this->selectedFilter = 'all';
        $this->heroes = hero::orderBy('nombre', 'asc')->get();
    }

    public function soloTank()
    {
        $this->reset();
        $this->selectedFilter = 'tank';
        $this->heroes = hero::where('rol', 'tank')->orderBy('nombre', 'asc')->get();
    }
    public function soloDps()
    {
        $this->reset();
        $this->selectedFilter = 'dps';
        $this->heroes = hero::where('rol', 'dps')->orderBy('nombre', 'asc')->get();
    }
    public function soloSupp()
    {
        $this->reset();
        $this->selectedFilter = 'supp';
        $this->heroes = hero::where('rol', 'supp')->orderBy('nombre', 'asc')->get();
    }

    public function selectHero($id)
    {
        $this->selectedHero = hero::where('id', $id)->first();
        $this->counters = $this->selectedHero->counteredBy;
        $this->countereas = $this->selectedHero->counters;

        // dd($this);

        // Separar los counters por rol
        foreach ($this->counters as $counter) {
            $this->countersByRol[$counter->rol][] = $counter;
        }

        // Separar los countereas por rol
        foreach ($this->countereas as $counterea) {
            $this->countereasByRol[$counterea->rol][] = $counterea;
        }
    }

    #[On('modalClosed')]
    public function reiniciar()
    {
        $this->selectedHero = null;
        $this->reset('counters','countereas','countersByRol','countereasByRol');
    }

    public function render()
    {
        return view('main-page');
    }
}
