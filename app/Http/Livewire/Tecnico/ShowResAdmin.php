<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Resadmin;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowResAdmin extends Component
{
    use WithFileUploads;
    
    public $tramite, $resadmin,$identificador,$archivo,$search;

    public $open_edit = false;

    protected $rules = [
        'resadmin.numruta' => 'required',
       //'resadmin.numresolucion' => 'required',
        'resadmin.fecha' => 'required',
        'resadmin.tipo' => 'required',

    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Resadmin $resadmin)
    {
        $this->resadmin = $resadmin;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->resadmin->archivo);
           $this->resadmin->archivo = $this->archivo->store('public/resadmin');
        }

        $this->resadmin->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-res-admin','render');
        $this->emit('alert', 'La resolución se actualizó correctamente','render');
    }

    public function delete(Resadmin $resadmin){
        $resadmin->delete();
        
    }

    public function render()
    {
        $resadmins = Tramite::find($this->tramite->id)->resadmins()
        //->where('numruta','like','%'.$this->search.'%')
        //->orwhere('tipo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-res-admin',compact('resadmins'));
    }
}
