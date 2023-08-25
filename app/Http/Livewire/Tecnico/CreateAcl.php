<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Acl;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAcl extends Component
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
        'tipo' => 'required',
        'fecha' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/infbase');

        Acl::create([
          'numruta' => $this->numruta,
          'tipo' => $this->tipo,
          'fecha' => $this->fecha,
          'observacion' =>$this->observacion,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','numruta','fecha','observacion','tipo','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-acl','render');
        $this->emit('alert','El documento se creó correctamente');

    }

    public function render()
    {
        return view('livewire.tecnico.create-acl');
    }
}
