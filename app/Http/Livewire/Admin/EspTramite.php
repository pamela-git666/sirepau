<?php

namespace App\Http\Livewire\Admin;

use App\Models\Especialista;
use Livewire\Component;

class EspTramite extends Component
{
     //estado del modal
     public $item;
     public $open = false;

    public function render()
    {
       $tecnico = $this->item;
        return view('livewire.admin.esp-tramite',compact('tecnico'));
    }
}
