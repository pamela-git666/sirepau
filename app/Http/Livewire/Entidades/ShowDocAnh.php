<?php

namespace App\Http\Livewire\Entidades;

use Livewire\Component;

class ShowDocAnh extends Component
{
    public $item;
    public $open = false;

    public function render()
    {
        $anh = $this->item;
        return view('livewire.entidades.show-doc-anh',compact('anh'));
    }
}
