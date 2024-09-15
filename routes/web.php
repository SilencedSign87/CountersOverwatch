<?php

use App\Components\MainPage;
use App\Components\Tierlist;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPage::class);
Route::get('/tierlist', Tierlist::class);