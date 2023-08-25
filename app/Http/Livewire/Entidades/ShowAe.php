<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Ae;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAe extends Component
{
    use WithFileUploads;
    public $ritu, $ae,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'ae.numruta' => 'required',
        'ae.fecha' => 'required',
        'ae.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Ae $ae)
    {
        $this->ae = $ae;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->ae->archivo);
           $this->ae->archivo = $this->archivo->store('public/aes');
        }

        $this->ae->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-ae','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Ae $ae){
        $ae->delete();
        
    }
    
    public function render()
    {
        $aes = Ritu::find($this->ritu->id)->aes()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-ae',compact('aes'))->layout('layouts.app');
    }
}
