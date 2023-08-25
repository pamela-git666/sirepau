<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Ine;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowIne extends Component
{
    use WithFileUploads;
    public $ritu, $ine,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'ine.numruta' => 'required',
        'ine.fecha' => 'required',
        'ine.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Ine $ine)
    {
        $this->ine = $ine;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->ine->archivo);
           $this->ine->archivo = $this->archivo->store('public/ine');
        }

        $this->ae->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-ine','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Ine $ine){
        $ine->delete();
        
    }
    
    public function render()
    {
        $ines = Ritu::find($this->ritu->id)->ines()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-ine',compact('ines'));
    }
}
