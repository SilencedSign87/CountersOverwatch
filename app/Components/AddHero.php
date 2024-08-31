<?php

namespace App\Components;

use App\Models\hero;
use Livewire\Component;

class AddHero extends Component
{
    public $nombre, $img_path, $rol;

    // Valida y Crea el héroe
    public function registrarHeroe(){
        
        $this->validate([
            'nombre'=>'required|max:255',
            'img_path'=>'required',
            'rol'=>'required|in:tank,dps,supp',
        ]);

        $hero=hero::create([
            'nombre'=>$this->nombre,
            'img_path'=>$this->img_path,
            'rol'=>$this->rol,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('add-hero');
    }
}
