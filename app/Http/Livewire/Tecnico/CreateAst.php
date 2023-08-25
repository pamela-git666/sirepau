<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Ast;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAst extends Component
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
        'observacion' =>'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/infbase');

        Ast::create([
          'numruta' => $this->numruta,
          'fecha' => $this->fecha,
          'observacion' =>$this->observacion,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','numruta','fecha','observacion','archivo']);

        $this->identificador = rand();

        $this->emitTo('tecnico.show-ast','render');
        $this->emit('alert','El documento se creó correctamente');

    }

    public function render()
    {
        return view('livewire.tecnico.create-ast');
    }
}
