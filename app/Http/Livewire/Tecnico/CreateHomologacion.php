<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Homologacion;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateHomologacion extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite,$numruta,$fecha,$tipo, $observacion, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'numruta' => 'required',
        'fecha' => 'required',
        'observacion' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/infbase');

        Homologacion::create([
          'numruta' => $this->numruta,
          'fecha' => $this->fecha,
          'tipo' => $this->tipo,
          'observacion' =>$this->observacion,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','numruta','fecha','tipo','observacion','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-homologacion','render');
        $this->emit('alert','El documento se creó correctamente');

    }

    public function render()
    {
        return view('livewire.tecnico.create-homologacion');
    }
}
