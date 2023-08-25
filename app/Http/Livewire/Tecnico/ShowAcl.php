<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Acl;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAcl extends Component
{
    use WithFileUploads;
    public $tramite, $acl,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'acl.numruta' => 'required',
        'acl.fecha' => 'required',
        'acl.tipo' => 'required',
        'acl.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Acl $acl)
    {
        $this->acl = $acl;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->acl->archivo);
           $this->acl->archivo = $this->archivo->store('public/infbase');
        }

        $this->acl->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-acl','render');
        $this->emit('alert', 'El documento se actualizó correctamente','render');
    }

    public function delete(Acl $acl){
        $acl->delete();   
    }

    public function render()
    {
        $acls = Tramite::find($this->tramite->id)->acls()
       // ->where('numruta','like','%'.$this->search.'%')
        //->orwhere('tipo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-acl',compact('acls'))->layout('layouts.app');
    }
}
