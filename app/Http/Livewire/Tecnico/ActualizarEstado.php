<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Tramite;
use Livewire\Component;

class ActualizarEstado extends Component
{
    public $tramite,$status;

    protected $listeners = ['render'];


    public function mount(){
        $this->status = $this->tramite->status;
    }

    protected $rules = [
        'status' => 'required',
    ];
    
    public function update(){
        $this->validate();
        $this->tramite->status = $this->status;
        $this->tramite->save();
        $dan = $this->tramite;
        $this->emit('tecnico.actualizar-estado','render');
        $this->reset(['status']);
    }

    public function render()
    {
        return view('livewire.tecnico.actualizar-estado');
    }
}
