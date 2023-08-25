<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Homologacion;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowHomologacion extends Component
{
    use WithFileUploads;
    public $tramite, $homologacion,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'homologacion.numruta' => 'required',
        'homologacion.fecha' => 'required',
        'homologacion.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Homologacion $homologacion)
    {
        $this->homologacion = $homologacion;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->homologacion->archivo);
           $this->homologacion->archivo = $this->archivo->store('public/homologacion');
        }

        $this->homologacion->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-homologacion','render');
        $this->emit('alert', 'El documento se actualizó correctamente','render');
    }

    public function delete(Homologacion $homologacion){
        $homologacion->delete();
        
    }

    public function render()
    {
        $homologacions = Tramite::find($this->tramite->id)->homologacions()
        //->where('numruta','like','%'.$this->search.'%')
        ->orderByDesc('id')
        ->paginate(10);
        return view('livewire.tecnico.show-homologacion',compact('homologacions'))->layout('layouts.app');
    }
}
