<?php

namespace App\Components;

use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class LoginComponent extends Component
{
    public $correo, $pass;

    public function volver()
    {
        $this->redirect('/');
    }

    public function login()
    {
        // dd($this); // para debug
        if (auth()->attempt(['email' => $this->correo, 'password' => $this->pass])) {
            session()->regenerate();
            session()->flash('message', 'Sesión iniciada');
            $this->redirect('/admin');
        } else {
            session()->flash('error', 'No se encontró al usuario');
        }
        $this->reset();
    }

    public function render()
    {
        return view('login-component');
    }
}
