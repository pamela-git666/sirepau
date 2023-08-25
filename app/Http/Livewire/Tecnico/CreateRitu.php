<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Ritu;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRitu extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite,$numruta,$fecha,$nombre, $observacion, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'numruta' => 'required',
        'nombre' => 'required',
        'fecha' => 'required',
        'observacion' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/ritu');
        $año = Carbon::now()->format('Y');
        Ritu::create([
          'numruta' => 'MPR/VA/DGA/UAUyM_ IT_RITU N° '.$this->numruta.'/'.$año,
          'nombre' => $this->nombre,
          'fecha' => $this->fecha,
          'observacion' => $this->observacion,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','numruta','nombre','fecha','observacion','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-ritu','render');
        $this->emit('alert','ritu se creó correctamente');

    }

    public function render()
    {
      return view('livewire.tecnico.create-ritu');
    }
}
