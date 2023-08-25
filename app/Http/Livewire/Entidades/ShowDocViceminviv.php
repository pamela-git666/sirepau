<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocViceminviv extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $viceminviv = $this->item;

        return view('livewire.entidades.show-doc-viceminviv',compact('viceminviv'));
    }
}
