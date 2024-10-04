<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\Request;

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
