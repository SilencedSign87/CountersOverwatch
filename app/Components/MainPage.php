<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

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
        $this->filtrarHeroes();
    }

    public function filtrarHeroes($rol = 'all')
    {
        $this->reset();
        $this->selectedFilter = $rol;

        if ($rol === 'all') {
            $this->heroes = hero::orderBy('nombre', 'asc')->get();
        } else {
            $this->heroes = hero::where('rol', $rol)->orderBy('nombre', 'asc')->get();
        }
    }

    public function selectHero($id)
    {
        $this->selectedHero = hero::find($id);
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

    #[On('modalCerrado')]
    public function reiniciar()
    {
        $this->reset('selectedHero', 'counters', 'countereas', 'countersByRol', 'countereasByRol');
    }

    public function render()
    {
        return view('main-page');
    }
}
