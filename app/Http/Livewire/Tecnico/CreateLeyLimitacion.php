<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Leylimitacion;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateLeyLimitacion extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite,$nombre_ley_municipal,$fecha,$nombre, $observacion, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'nombre_ley_municipal' => 'required',
        'fecha' => 'required',
        'observacion' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/leylimitacion');

        Leylimitacion::create([
          'numruta' => $this->nombre_ley_municipal,
          'fecha' => $this->fecha,
          'observacion' => $this->observacion,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','nombre_ley_municipal','fecha','observacion','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-ley-limitacion','render');
        $this->emit('alert','ritu se creó correctamente');

    }

    public function render()
    {
        return view('livewire.tecnico.create-ley-limitacion');
    }
}
