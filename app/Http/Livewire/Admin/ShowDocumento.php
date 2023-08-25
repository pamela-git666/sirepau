<?php

namespace App\Http\Livewire\Admin;

use App\Models\Documento;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;

class ShowDocumento extends Component
{
    use WithFileUploads;
    public $tramite, $documento,$identificador,$archivo;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'documento.informe' => 'required',
    ];

    protected $listeners = ['delete','render'];

    public function mount()
    {
        $this->identificador = rand();
    }

    public function edit(Documento $documento)
    {
        $this->documento = $documento;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->documento->archivo);
           
           $this->documento->archivo = $this->archivo->store('public/archivo');
        }

        $this->documento->save();

        $this->reset(['open_edit']);
        $this->emitTo('admin.show-documento','render');
        $this->emit('alert', 'El documento se actualizó correctamente','render');
    }

    public function delete(Documento $documento){
        $documento->delete();
        $this->emitTo('admin.show-documento','render');
    }

    public function render()
    {
       
        return view('livewire.admin.show-documento')->layout('layouts.app');
    }
}
