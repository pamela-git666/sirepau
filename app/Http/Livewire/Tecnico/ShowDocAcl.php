<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocAcl extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $acl = $this->item;
        return view('livewire.tecnico.show-doc-acl',compact('acl'));
    }
}
