<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Viceminviv;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowViceminviv extends Component
{
    use WithFileUploads;
    public $ritu, $viceminviv,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'viceminviv.numruta' => 'required',
        'viceminviv.fecha' => 'required',
        'viceminviv.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Viceminviv $viceminviv)
    {
        $this->viceminviv = $viceminviv;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->viceminviv->archivo);
           $this->viceminviv->archivo = $this->archivo->store('public/viceminviv');
        }

        $this->viceminviv->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-viceminviv','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Viceminviv $viceminviv){
        $viceminviv->delete();
        
    }
    
    public function render()
    {
        $viceminvivs = Ritu::find($this->ritu->id)->viceminvivs()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-viceminviv',compact('viceminvivs'));
    }
}
