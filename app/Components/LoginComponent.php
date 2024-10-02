<?php

namespace App\Components;

use Livewire\Component;

class LoginComponent extends Component
{

    public $correo;
    public $pass;

    public function mount(){
        if(auth()->check()){
            $this->redirect('/tierlist');
        }
    }

    public function login()
    {
        if (auth()->attempt(['email' => $this->correo, 'password' => $this->pass])) {
            session()->regenerate();
            $this->redirect('/tierlist-maker');
        }

        $this->reset();
    }

    public function render()
    {
        return view('login-component');
    }
}
