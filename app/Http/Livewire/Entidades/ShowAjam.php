<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Ajam;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAjam extends Component
{
    use WithFileUploads;
    public $ritu, $ajam,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'ajam.numruta' => 'required',
        'ajam.fecha' => 'required',
        'ajam.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Ajam $ajam)
    {
        $this->ajam = $ajam;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->ajam->archivo);
           $this->ajam->archivo = $this->archivo->store('public/ajams');
        }

        $this->ajam->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-ajam','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Ajam $ajam){
        $ajam->delete();
        
    }
    
    public function render()
    {
        $ajams = Ritu::find($this->ritu->id)->ajams()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-ajam',compact('ajams'));
    }
}
