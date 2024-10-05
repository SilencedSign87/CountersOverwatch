<?php

namespace App\Http\Controllers;

use App\Models\hero;
use App\Models\tierlist;
use Illuminate\Http\Request;
use App\Models\tierlist_tier;
use App\Models\tierlist_entry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {

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
                return response()->json(['success' => false, 'message' => 'Hay heroes sin registrar,  no se registró nada']);
            }

            // Crear la tierlist
            try {
                // Iniciar transacción
                DB::beginTransaction();

                // Crear tierlist padre
                $newTierlist = new tierlist();
                $newTierlist->nombre = $tierlistData['nombre'];
                $newTierlist->descripcion = $tierlistData['descripcion'];
                $newTierlist->fecha = date('Y-m-d');
                $newTierlist->num_tiers = count($tierlistData['tiers']) - 1;

                $newTierlist->save();

                // Crear los tier_rows y tier_entry
                foreach ($tierlistData['tiers'] as $tierIndex => $tier) {
                    // Iterar tiers
                    if ($tier['nombre']) {
                        $newTierRow = new tierlist_tier();
                        $newTierRow->tierlist_id = $newTierlist->id;
                        $newTierRow->posicion = $tier['tier_index'];
                        $newTierRow->nombre = $tier['nombre'];
                        $newTierRow->color = $tier['color'];

                        $newTierRow->save();

                        // Iterar entradas
                        foreach ($tier['entries'] as $entryIndex => $entry) {
                            $newTierEntry = new tierlist_entry();
                            $newTierEntry->tierlist_tier_id = $newTierRow->id;
                            $newTierEntry->posicion = $entry['posicion'];
                            $newTierEntry->hero_id = $entry['hero_id'];

                            $newTierEntry->save();
                        }
                    }
                }

                // Confirmar la transacción
                DB::commit();

                // Mensaje de confirmación
                return response()->json(['success' => true, 'message' => 'Tierlist guardada correctamente']);
            } catch (\Exception $e) {
                // Revertir los cambios en caso de error
                DB::rollBack();

                return response()->json(['success' => false, 'message' => 'Error al guardar tierlist', 'error' => $e->getMessage()]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'No estás autenticado, no se puede guardar la tierlist']);
        }
    }
}
