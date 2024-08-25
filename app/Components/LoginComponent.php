<?php

namespace App\Components;

use Livewire\Component;

class LoginComponent extends Component
{
    public $user,$pass;

    public function volver(){
        $this->redirect('/');

    }

    public function login(){
dd($this);
    }

    public function render()
    {
        return view('login-component');
    }
}
