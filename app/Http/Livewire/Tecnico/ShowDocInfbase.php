<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocInfbase extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $infbase = $this->item;
        return view('livewire.tecnico.show-doc-infbase',compact('infbase'));
    }
}
