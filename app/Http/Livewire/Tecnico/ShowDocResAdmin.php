<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocResAdmin extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $resadmin = $this->item;
        return view('livewire.tecnico.show-doc-res-admin',compact('resadmin'));
    }
}
