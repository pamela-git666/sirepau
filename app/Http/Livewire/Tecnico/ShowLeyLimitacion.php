<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Leylimitacion;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowLeyLimitacion extends Component
{
    use WithFileUploads;
    public $tramite, $ritu,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'leylimitacion.numruta' => 'required',
        'leylimitacion.fecha' => 'required',
        'leylimitacion.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Leylimitacion $leylimitacion)
    {
        $this->leylimitacion = $leylimitacion;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->leylimitacion->archivo);
           
           $this->leylimitacion->archivo = $this->archivo->store('public/leylimitacion');
        }

        $this->leylimitacion->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-ley-limitacion','render');
        $this->emit('alert', 'El archivo se actualizó correctamente','render');
    }

    public function delete(Leylimitacion $leylimitacion){
        $leylimitacion->delete();
    }

    public function render()
    {
        $leylimitacions = Tramite::find($this->tramite->id)->leylimitacions()
       // ->where('numruta','like','%'.$this->search.'%')
       // ->orwhere('fecha','like','%' . $this->search . '%')
        //->orwhere('observacion','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-ley-limitacion',compact('leylimitacions'))->layout('layouts.app');
    }
}
