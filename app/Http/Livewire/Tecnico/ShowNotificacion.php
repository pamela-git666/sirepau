<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Mensaje;
use App\Models\User;
use Livewire\Component;

class ShowNotificacion extends Component
{
    public $tecnico;

    protected $listeners = ['delete','render']; 
    
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function delete(Mensaje $mensaje){
        $mensaje->delete();   
    }

    public function render()
    {
        $mensajes = User::find($this->user->id)->mensajes()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-notificacion',compact('mensajes'))->layout('layouts.app');
    }
}
