<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\Request;

class countersController extends Controller
{
    public function index(){
        
        $HeroesRol=[
            'tank'=>[],
            'dps'=>[],
            'supp'=>[]
        ];

        $tank = hero::where('rol', 'tank')->orderBy('nombre')->get()->toArray();
        $dps = hero::where('rol', 'dps')->orderBy('nombre')->get()->toArray();
        $supp = hero::where('rol', 'supp')->orderBy('nombre')->get()->toArray();

        $HeroesRol['tank']=$tank;
        $HeroesRol['dps']=$dps;
        $HeroesRol['supp']=$supp;

        // dd($HeroesRol);

        return view('counters-edit', compact('HeroesRol'));
    }
}
