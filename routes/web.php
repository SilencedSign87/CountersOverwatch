<?php

use App\Components\MainPage;
use App\Components\tierlistComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPage::class);
Route::get('/tierlist', tierlistComponent::class);