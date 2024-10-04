<?php

use App\Components\MainPage;
use App\Components\LoginComponent;
use App\Components\tierlistComponent;
use App\Http\Controllers\countersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TierlistMakerController;

Route::get('/', MainPage::class);
Route::get('/login', LoginComponent::class)->name('login');
Route::get('/tierlist', tierlistComponent::class);


Route::get('/tierlist-maker', [TierlistMakerController::class, 'index']);

// Middleware
Route::group(['middleware' => 'auth'], function () {
    // Cerrar sesión
    Route::post('/tierlist-maker/logout', [TierlistMakerController::class, 'CerrarSesion']);
    // Guardar la tierlist en la base de datos
    Route::post('/tierlist-maker/new', [TierlistMakerController::class, 'guardarTierlist']);
    Route::get('/panelControl', [countersController::class,'index']);
    Route::get('/counters/all', [countersController::class,'getAllCounters']);
});