<?php

use App\Components\MainPage;
use App\Components\tierlistComponent;
use App\Components\TierlistMaker;
use App\Http\Controllers\TierlistMakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPage::class);
Route::get('/tierlist', tierlistComponent::class);
// Route::get('/tierlist-maker', TierlistMaker::class);

Route::get('/tierlist-maker', [TierlistMakerController::class, 'index']);
Route::post('/tierlist-maker', [TierlistMakerController::class, 'guardarTierlist']);