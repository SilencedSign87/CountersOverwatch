<?php

namespace App\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{

    public $correo;
    public $pass;
    public $rememberMe=false;

    public function mount()
    {
        if (Auth::check()) {
            $this->redirect('/panelControl');
        }
    }

    public function login()
    {

        $this->validate([
            'correo' => 'required|email',
            'pass' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->correo, 'password' => $this->pass], $this->rememberMe)) {
            $this->redirect('/panelControl');
        }else{
            session()->flash('error', 'Credenciales incorrectas');
        }

        $this->reset();
    }

    public function render()
    {
        return view('login-component');
    }
}
