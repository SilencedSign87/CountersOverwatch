<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\Request;

class TierlistMakerController extends Controller
{
    public function index()
    {
        $tiers = [
            ['nombre' => 'S', 'color' => '#ff7f80', 'entries' => []],
            ['nombre' => 'A', 'color' => '#ffc07f', 'entries' => []],
            ['nombre' => 'B', 'color' => '#ffdf80', 'entries' => []],
            ['nombre' => 'C', 'color' => '#ffff7f', 'entries' => []],
            ['nombre' => 'D', 'color' => '#bfff7f', 'entries' => []],
        ];

        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get()->toArray();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get()->toArray();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get()->toArray();

        $heroesDisponibles = array_merge($tank, $dps, $supp);

        return view('tierlist-maker', compact('tiers', 'heroesDisponibles'));
    }

    public function guardarTierlist(Request $request)
    {
        // Validar y guardar la tierlist en la base de datos
        // ... (código para guardar la tierlist - similar al método del componente Livewire) ...
    }
}