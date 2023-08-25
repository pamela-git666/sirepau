<?php

namespace App\Http\Livewire\Admin;

use App\Models\Documento;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocumento extends Component
{
    use WithFileUploads;
    public $open = false;
    public $tramite, $informe, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'informe' => 'required',
        'archivo' => 'required|max:12288|mimes:pdf'
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/archivo');

        Documento::create([
          'informe' => $this->informe,
          'archivo' => $archivo,
          'tramite_id' =>$this->tramite->id,
        ]);

        $this->reset(['open','informe','archivo']);

        $this->identificador = rand();

        $this->emitTo('admin.show-documento','render');
        $this->emit('alert','el archivo se creó correctamente');

    }
    public function render()
    {
        return view('livewire.admin.create-documento');
    }
}
