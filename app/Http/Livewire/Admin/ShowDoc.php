<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShowDoc extends Component
{
    public $documento;
     public $open = false;

    public function render()
    {
        $documento = $this->documento;
        return view('livewire.admin.show-doc',compact('documento'));
    }
}
