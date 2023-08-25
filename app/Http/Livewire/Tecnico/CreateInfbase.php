<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Infbase;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateInfbase extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite,$numruta,$fecha,$tipo, $archivo, $identificador,$numcite;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'numruta' => 'required',
        'fecha' => 'required',
        'tipo' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/infbase');

        $infbase = new Infbase();
        $infbase->numruta = $this->numruta;
        $infbase->fecha = $this->fecha;
        $infbase->tipo = $this->tipo;
         if ($infbase->numcite) {
            $infbase->numcite = $this->numcite;
         }else {
            $infbase->numcite = 's/c';
         }
        $infbase->archivo = $this->archivo;
        $infbase->tramite_id = $this->tramite->id;

        $infbase->save();


        $this->reset(['open','numruta','fecha','tipo','numcite','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.informacion-base','render');
        $this->emit('alert','La Información Base se creó correctamente');

    }
    
    public function render()
    {
        return view('livewire.tecnico.create-infbase');
    }
}
