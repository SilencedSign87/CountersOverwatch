<?php

use App\Components\MainPage;
use App\Components\tierlistComponent;
use App\Components\TierlistMaker;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPage::class);
Route::get('/tierlist', tierlistComponent::class);
Route::get('/tierlist-maker', TierlistMaker::class);