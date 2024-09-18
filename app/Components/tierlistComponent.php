<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use Livewire\Component;

class tierlistComponent extends Component
{
    public $searchTerm; // Para autocompletado o búsqueda
    public $selectedTierlistId; // Para almacenar el id de la tierlist seleccionada
    public $tierlistNames = []; // Para almacenar los nombres de las tierlists

    public  $filtroR;
    public $tierlistGrouped, $tierlist;


    public function mount()
    {
        $this->cargarTierlistActual();
        $this->cargarNombresDeTierlist();
    }

    // Seleccionar el rol a filtrar
    public function filtrarPorRol($rol = null)
    {
        $this->filtroR = $rol;
        $this->cargarTierlistActual($rol);
    }

    // Seleccionar la tierlist a mostrar
    public function seleccionarTierlist($tierlistId)
    {
        $this->selectedTierlistId = $tierlistId;
        $this->cargarTierlistActual($this->filtroR); //conservar el filtro
    }

    // Cargar los nombres de las tierlists
    private function cargarNombresDeTierlist()
    {
        $this->tierlistNames = tierlist::pluck('nombre', 'id')->toArray();
    }

    // Cargar la tierlist actual
    private function cargarTierlistActual($filtro = null)
    {
        // Si no se selecciona una tierlist, usar una por defecto
        if (!$this->selectedTierlistId) {
            $this->tierlist = tierlist::latest()->first();
        } else {
            $this->tierlist = tierlist::find($this->selectedTierlistId);
        }

        if ($this->tierlist) {
            if (is_null($filtro)) {
                $this->tierlistGrouped = $this->tierlist->tiers()
                    ->with(['entries.hero' => function ($q) {
                        $q->orderByRaw("FIELD(rol, 'tank', 'dps', 'supp')");
                    }])
                    ->orderBy('posicion', 'asc')
                    ->get();
            } else {
                $heroesFiltrados = Hero::where('rol', $filtro)->get();
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

    public function render()
    {
        return view('tierlist-component');
    }
}
