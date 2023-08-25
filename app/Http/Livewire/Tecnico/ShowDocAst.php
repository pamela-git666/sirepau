<?php

namespace App\Http\Livewire\Tecnico;

use Livewire\Component;

class ShowDocAst extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $ast = $this->item;
        return view('livewire.tecnico.show-doc-ast',compact('ast'));
    }
}
