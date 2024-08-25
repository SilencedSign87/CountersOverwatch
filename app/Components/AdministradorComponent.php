<?php

namespace App\Components;

use Livewire\Component;

class AdministradorComponent extends Component
{
    public $Modo = 'counters';

    public function editCounter()
    {
        $this->Modo = 'counters';
    }

    public function crearTierlist()
    {
        $this->Modo = 'tierlist';
    }


    public function nuevoHeroe()
    {
        $this->Modo = 'heroe';
    }

    public function algo()
    {
        auth()->logout();
        session()->flash('message', 'Sesión cerrada');
        return Redirect('/');
    }

    public function mount()
    {
        if (!auth()->check()) {
            return redirect('/');
        }
    }
    public function render()
    {
        return view('administrador-component');
    }
}
