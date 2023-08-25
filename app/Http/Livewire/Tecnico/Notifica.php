<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Mensaje;
use Livewire\Component;

class Notifica extends Component
{ 
    public $tramite;


    public function render()
    {
        $mensajes = Mensaje::where('user_id', auth()->user()->id)
         ->orderByDesc('id')->get();

        $num = Mensaje::where('user_id', auth()->user()->id)
        ->where('status', 1)
        ->count();

        return view('livewire.tecnico.notifica',compact('mensajes','num'));
    }
}
