<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CreateUsuario extends Component
{
    public $apellidos,$nombres,$ci,$telefono,$cargo;

    public function render()
    {
        return view('livewire.admin.create-usuario');
    }
}
