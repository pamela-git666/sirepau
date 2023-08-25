<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Itu;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowItu extends Component
{
    use WithFileUploads;
    public $tramite, $itu,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'itu.numruta' => 'required',
        'itu.numinforme' => 'required',
        'itu.fecha' => 'required',
        'itu.tipo' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Itu $itu)
    {
        $this->itu = $itu;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->itu->archivo);
           
           $this->itu->archivo = $this->archivo->store('public/itu');
        }

        $this->itu->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-itu','render');
        $this->emit('alert', 'El Itu se actualizó correctamente','render');
    }

    public function delete(Itu $itu){
        $itu->delete();
        $this->emitTo('tecnico.show-itu','render');
    }

    public function render()
    {
        $itus = Tramite::find($this->tramite->id)->itus()
        //->where('numruta','like','%'.$this->search.'%')
        //->orwhere('tipo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);
        
        return view('livewire.tecnico.show-itu',compact('itus'));
    }
}
