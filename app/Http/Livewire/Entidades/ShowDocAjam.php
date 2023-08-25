<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocAjam extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $ajam = $this->item;
        return view('livewire.entidades.show-doc-ajam',compact('ajam'));
    }
}
