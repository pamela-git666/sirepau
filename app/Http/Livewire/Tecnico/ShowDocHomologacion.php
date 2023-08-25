<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocHomologacion extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $homologacion = $this->item;
        return view('livewire.tecnico.show-doc-homologacion',compact('homologacion'));
    }
}
