<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocSernap extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $sernap = $this->item;
        return view('livewire.entidades.show-doc-sernap',compact('sernap'));
    }
}
