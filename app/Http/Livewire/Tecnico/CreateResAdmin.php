<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Resadmin;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateResAdmin extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite,$numruta,$numresolucion,$fecha,$tipo, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'numruta' => 'required',
        //'numresolucion' => 'required',
        'fecha' => 'required',
        'tipo' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/resadmin');

        $resadmin = new Resadmin();
        $resadmin->numruta = $this->numruta;
       //$resadmin->numresolucion = $this->numresolucion;
        $resadmin->fecha = $this->fecha;
        $resadmin->tipo = $this->tipo;
        $resadmin->archivo = $archivo;
        $resadmin->tramite_id = $this->tramite->id;

        $resadmin->save();


        $this->reset(['open','numruta','fecha','tipo','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-res-admin','render');
        $this->emit('alert','La Resolución se registró correctamente');

    }

    public function render()
    {
        return view('livewire.tecnico.create-res-admin');
    }
}
