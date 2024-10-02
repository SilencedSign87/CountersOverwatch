<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class countersController extends Controller
{
    public function index(){
        return view('counters-edit');
    }
}
