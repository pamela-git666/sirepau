<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Infbase;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class InformacionBase extends Component
{
    use WithFileUploads;
    
    public $tramite, $infbase,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'infbase.numruta' => 'required',
        'infbase.fecha' => 'required',
        'infbase.tipo' => 'required',
        'infbase.numcite' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Infbase $infbase)
    {
        $this->infbase = $infbase;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->infbase->archivo);
           $this->infbase->archivo = $this->archivo->store('public/infbase');
        }

        $this->infbase->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.informacion-base','render');
        $this->emit('alert', 'La información base se actualizó correctamente','render');
    }

    public function delete(Infbase $infbase){
        $infbase->delete();
        
    }

    public function render()
    {
        $infbases = Tramite::find($this->tramite->id)->infbases()
        //->where('numruta','like','%'.$this->search.'%')
        //->orwhere('tipo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.informacion-base',compact('infbases'))->layout('layouts.app');
    }
}
