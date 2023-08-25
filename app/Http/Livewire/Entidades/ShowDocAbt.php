<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocAbt extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $abt = $this->item;
        return view('livewire.entidades.show-doc-abt',compact('abt'));
    }
}
