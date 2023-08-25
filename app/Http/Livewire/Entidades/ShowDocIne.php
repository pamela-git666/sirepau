<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocIne extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $ine = $this->item;
        return view('livewire.entidades.show-doc-ine',compact('ine'));
    }
}
