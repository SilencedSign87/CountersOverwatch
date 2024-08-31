<?php

namespace App\Components;

use Livewire\Component;

class AddHero extends Component
{
    public $nombre, $img_path, $rol;

    public function render()
    {
        return view('add-hero');
    }
}
