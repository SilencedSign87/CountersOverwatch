<?php

namespace App\Http\Controllers;

use App\Models\hero;
use App\Models\tierlist;
use App\Models\tierlist_entry;
use App\Models\tierlist_tier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        $tierlistData = $request->input('tierlist');

        // Validar la datos obligatorios
        if (!$tierlistData['nombre'] || !$tierlistData['descripcion'] || !$tierlistData['tiers']) {
            return response()->json(['success' => false, 'message' => 'Faltan datos obligatorios, no se registró nada']);
        }
        // Revisar si el nombre es unico
        $tierlistAux = tierlist::where('nombre', $tierlistData['nombre'])->first();
        if ($tierlistAux) {
            return response()->json(['success' => false, 'message' => 'El nombre ya existe, no se registró nada']);
        }
        // Revisar si hay entries en el row final
        if (count($tierlistData['tiers'][count($tierlistData['tiers']) - 1]) > 0) {
            return response()->json(['success' => false, 'message' => 'Hay heroes no registrados en la tierlist, no se registró nada']);
        }

        try {

            // Crear tierlist padre
            $newTierlist = tierlist::new();
            $newTierlist->nombre = $tierlistData['nombre'];
            $newTierlist->descripcion = $tierlistData['descripcion'];
            $newTierlist->fecha = date('Y-m-d');
            $newTierlist->num_tiers = count($tierlistData['tiers']) - 1;

            $newTierlist->save();

            // $newTierlist = tierlist::create([
            //     'nombre' => $tierlistData['nombre'],
            //     'descripcion' => $tierlistData['descripcion'],
            //     // guarda solo la fecha (año mes dia)
            //     'fecha' => date('Y-m-d'),
            //     // El tier final no se incluye
            //     'num_tiers' => count($tierlistData['tiers']) - 1
            // ]);

            // Crear los tier_rows y tier_entry
            foreach ($tierlistData['tiers'] as $tierIndex => $tier) {
                // Itera tiers
                if ($tier['nombre']) {
                    $newTierRow = tierlist_tier::new();
                    $newTierRow->tierlist_id = $newTierlist->id;
                    $newTierRow->posicion = $tier['tier_index'];
                    $newTierRow->nombre = $tier['nombre'];
                    $newTierRow->color = $tier['color'];

                    $newTierRow->save();

                    // $newTierRow = tierlist_tier::create([
                    //     'tierlist_id' => $newTierlist->id,
                    //     'posicion' => $tier['tier_index'],
                    //     'nombre' => $tier['nombre'],
                    //     'color' => $tier['color']
                    // ]);

                    foreach ($tier['entries'] as $entryIndex => $entry) {
                        // Itera entradas

                        $newTierEntry = tierlist_entry::new();
                        $newTierEntry->tierlist_tier_id = $newTierRow->id;
                        $newTierEntry->posicion = $entry['posicion'];
                        $newTierEntry->hero_id = $entry['hero_id'];

                        $newTierEntry->save();
                        // $newTierEntry = tierlist_entry::create([
                        //     'tierlist_tier_id' => $newTierRow->id,
                        //     'posicion' => $entry['posicion'],
                        //     'hero_id' => $entry['hero_id']
                        // ]);
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar tierlist', 'error' => $e->getMessage()]);
        }


        return response()->json(['success' => true, 'message' => 'Tierlist guardada correctamente']);
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
