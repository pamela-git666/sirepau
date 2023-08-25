<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Directrices extends Component
{
    public $open_normativa = false;
    public $open_carta = false;
    public $open_limite = false;
    public $open_convenio = false;
    public $open_guia = false;

    public function render()
    {
        return view('livewire.directrices');
    }
}
