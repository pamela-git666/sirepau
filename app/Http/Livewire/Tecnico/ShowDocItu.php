<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocItu extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $itu = $this->item;
        return view('livewire.tecnico.show-doc-itu',compact('itu'));
    }
}
