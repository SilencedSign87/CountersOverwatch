<?php

use App\Components\AdministradorComponent;
use App\Components\LoginComponent;
use App\Components\MainPage;
use App\Components\TodosHeroes;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPage::class);

Route::get('/login',LoginComponent::class);

Route::get('/admin', AdministradorComponent::class);