<?php

namespace App\Components;

use App\Models\hero;
use App\Models\tierlist;
use App\Models\tierlist_entry;
use App\Models\tierlist_tier;
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

    public function mount()
    {
        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get()->toArray();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get()->toArray();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get()->toArray();

        // Asignar héroes disponibles al footer
        $this->heroesDisponibles = array_merge($tank, $dps, $supp);
    }

    public function guardarTierlist(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'fecha' => 'nullable|date',
            'tiers' => 'required|array',
        ]);

        // Crear la tierlist
        $tierlist = tierlist::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'num_tiers' => count($request->tiers),
        ]);

        // Crear los tiers y las entradas
        foreach ($request->tiers as $tierData) {
            $tier = tierlist_tier::create([

                'tierlist_id' => $tierlist->id,
                'posicion' => $tierData['tier_index'],
                // ... (otros campos del tier - nombre, color) ...
            ]);

            foreach ($tierData['entries'] as $entryData) {
                tierlist_entry::create([

                    'tierlist_tier_id' => $tier->id,
                    'hero_id' => $entryData['hero_id'],
                    'posicion' => $entryData['posicion'],
                ]);
            }
        }

        // Retornar una respuesta exitosa
        return response()->json(['mensaje' => 'Tierlist guardada correctamente'], 201);
    }


    public function render()
    {
        return view('tierlist-maker');
    }
}
