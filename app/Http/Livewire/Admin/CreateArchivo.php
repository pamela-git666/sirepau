<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Archivo;
use Livewire\WithFileUploads;

class CreateArchivo extends Component
{
    use WithFileUploads;
    public $open = false;
    public $nombre, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'nombre' => 'required|min:5',
        'archivo' => 'required|max:1024|mimes:pdf',
    ];

    public function save(){
        $this->validate();

      $archivo = $this->archivo->store('public/archivo');

        Archivo::create([
          'nombre' => $this->nombre,
          'archivo' => $archivo
        ]);

        $this->reset(['open','nombre','archivo']);

        $this->identificador = rand();

        $this->emitTo('admin.show-archivo','render');
        $this->emit('alert','el archivo se creó correctamente');

    }

    public function render()
    {
        return view('livewire.admin.create-archivo');
    }
}
