<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocVicemintierra extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $vicemintierra = $this->item;

        return view('livewire.entidades.show-doc-vicemintierra',compact('vicemintierra'));
    }
}
