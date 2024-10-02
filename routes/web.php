<?php

use App\Components\MainPage;
use App\Components\LoginComponent;
use App\Components\tierlistComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TierlistMakerController;

Route::get('/', MainPage::class);
Route::get('/login', LoginComponent::class);
Route::get('/tierlist', tierlistComponent::class);

// Cerrar sesión
Route::post('/tierlist-maker/logout', [TierlistMakerController::class, 'CerrarSesion']);

Route::get('/tierlist-maker', [TierlistMakerController::class, 'index']);
Route::post('/tierlist-maker', [TierlistMakerController::class, 'guardarTierlist']);