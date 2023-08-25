<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Vicemintierra;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowVicemintierra extends Component
{
    use WithFileUploads;
    public $ritu, $vicemintierra,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'vicemintierra.numruta' => 'required',
        'vicemintierra.fecha' => 'required',
        'vicemintierra.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Vicemintierra $vicemintierra)
    {
        $this->vicemintierra = $vicemintierra;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->vicemintierra->archivo);
           $this->vicemintierra->archivo = $this->archivo->store('public/vicemintierra');
        }

        $this->vicemintierra->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-vicemintierra','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Vicemintierra $vicemintierra){
        $vicemintierra->delete();
        
    }

    public function render()
    {
        $vicemintierras = Ritu::find($this->ritu->id)->vicemintierras()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-vicemintierra',compact('vicemintierras'));
    }
}
