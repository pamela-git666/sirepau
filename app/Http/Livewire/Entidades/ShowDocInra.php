<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocInra extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $inra = $this->item;
        return view('livewire.entidades.show-doc-inra',compact('inra'));
    }
}
