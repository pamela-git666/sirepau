<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Itu;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateItu extends Component
{
     use WithFileUploads;
     public $open = false;
     public $tramite,$numruta,$numinforme,$fecha,$tipo, $archivo, $identificador;

     public function mount()
     {
         $this->identificador = rand();
     }
 
     protected $rules = [
         'numinforme' => 'required',
         'numruta' => 'required',
         'fecha' => 'required',
         'tipo' => 'required',
         'archivo' => 'required|max:30720|mimes:pdf'
     ];
 
     public function save(){
         $this->validate();
 
       $archivo = $this->archivo->store('public/itu');
 
         Itu::create([
           'numinforme' => $this->numinforme,
           'numruta' => $this->numruta,
           'fecha' => $this->fecha,
           'tipo' => $this->tipo,
           'archivo' => $archivo,
           'tramite_id' =>$this->tramite->id,
         ]);
 
         $this->reset(['open','numinforme','numruta','fecha','tipo','archivo']);
 
         $this->identificador = rand();
 
         $this->emitTo('tecnico.show-itu','render');
         $this->emit('alert','itu se creó correctamente');
 
     }

    public function render()
    {
        return view('livewire.tecnico.create-itu');
    }
}
