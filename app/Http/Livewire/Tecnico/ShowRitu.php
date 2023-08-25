<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Ritu;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowRitu extends Component
{
    use WithFileUploads;
    public $tramite, $ritu,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'ritu.numruta' => 'required',
        'ritu.nombre' => 'required',
        'ritu.fecha' => 'required',
        'ritu.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->ritu->archivo);
           
           $this->ritu->archivo = $this->archivo->store('public/ritu');
        }

        $this->ritu->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-ritu','render');
        $this->emit('alert', 'El Ritu se actualizó correctamente','render');
    }

    public function delete(Ritu $ritu){
        $ritu->delete();
        
    }

    public function render()
    {
        $ritus = Tramite::find($this->tramite->id)->ritus()
        ->where('numruta','like','%'.$this->search.'%')
        //->orwhere('nombre','like','%' . $this->search . '%')
        //->orwhere('observacion','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-ritu',compact('ritus'))->layout('layouts.app');
    }
}
