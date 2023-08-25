<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AutTramite extends Component
{
     //estado del modal
     public $item;
     public $open = false;

    public function render()
    {
        $autoridad = $this->item;
        return view('livewire.admin.aut-tramite',compact('autoridad'));
    }
}
