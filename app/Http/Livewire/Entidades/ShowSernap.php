<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Sernap;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowSernap extends Component
{
    use WithFileUploads;
    public $ritu, $sernap,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'sernap.numruta' => 'required',
        'sernap.fecha' => 'required',
        'sernap.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Sernap $sernap)
    {
        $this->sernap = $sernap;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->sernap->archivo);
           $this->sernap->archivo = $this->archivo->store('public/sernap');
        }

        $this->sernap->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-sernap','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Sernap $sernap){
        $sernap->delete();
        
    }
    
    public function render()
    {
        $sernaps = Ritu::find($this->ritu->id)->sernaps()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-sernap',compact('sernaps'));
    }
}
