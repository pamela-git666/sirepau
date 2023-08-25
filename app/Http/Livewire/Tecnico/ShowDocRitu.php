<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocRitu extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $ritu = $this->item;
        return view('livewire.tecnico.show-doc-ritu',compact('ritu'));
    }
}
