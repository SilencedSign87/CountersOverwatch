<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class countersController extends Controller
{
    public function index()
    {

        $HeroesRol = [
            'tank' => [],
            'dps' => [],
            'supp' => []
        ];

        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get()->toArray();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get()->toArray();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get()->toArray();

        $HeroesRol['tank'] = $tank;
        $HeroesRol['dps'] = $dps;
        $HeroesRol['supp'] = $supp;

        // dd($HeroesRol);

        return view('counters-edit', compact('HeroesRol'));
    }

    public function ActualizarCounters(Request $request)
    {

        $counters = $request->input('counters');
        if ($counters) {
            try {
                foreach ($counters as $heroData) {
                    $hero = Hero::find($heroData['hero_id']);
                    $hero->nota = $heroData['nota'];
                    
                    // Obtener los IDs de los counters del array
                    $counterIds = array_column($heroData['counters'], 'hero_id');
                    
                    // Sincronizar la relación counteredBy con los nuevos IDs
                    $hero->counteredBy()->sync($counterIds);
                    
                    $hero->save();
                }

                return response()->json(['success' => true, 'message' => 'Counters actualizados correctamente']);
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Faltan datos obligatorios, no se registró nada']);
        }
    }

    public function getAllCounters()
    {

        $heroes = Hero::with('counteredBy')->get();

        return response()->json($heroes);
    }

    public function getspecificCounter($heroId)
    {

        try {
            $hero = hero::find($heroId);
            $counteredBy = $hero->counteredBy;
            return response()->json($counteredBy);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function CerrarSesion(Request $request)
    {
        auth()->logout();
        $response = [];
        $response['status'] = 'success';
        $response['message'] = 'Sesión cerrada con éxito';
        return response()->json($response);
    }
}
