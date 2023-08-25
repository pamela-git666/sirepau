<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Abt;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAbt extends Component
{
    use WithFileUploads;
    public $ritu, $abt,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'abt.numruta' => 'required',
        'abt.fecha' => 'required',
        'abt.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Abt $abt)
    {
        $this->abt = $abt;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->abt->archivo);
           $this->abt->archivo = $this->archivo->store('public/abts');
        }

        $this->abt->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-abt','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Abt $abt){
        $abt->delete();
        
    }
    
    public function render()
    {
        $abts = Ritu::find($this->ritu->id)->abts()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-abt',compact('abts'))->layout('layouts.app');
    }
}
