<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocLeyLimitacion extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $leylimitacion = $this->item;
        return view('livewire.tecnico.show-doc-ley-limitacion',compact('leylimitacion'));
    }
}
