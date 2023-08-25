<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocAe extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $ae = $this->item;
        return view('livewire.entidades.show-doc-ae',compact('ae'));
    }
}
