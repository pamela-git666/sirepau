<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Anh;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAnh extends Component
{
    use WithFileUploads;
    public $ritu, $anh,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'anh.numruta' => 'required',
        'anh.fecha' => 'required',
        'anh.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Anh $anh)
    {
        $this->anh = $anh;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->anh->archivo);
           $this->anh->archivo = $this->archivo->store('public/anh');
        }

        $this->anh->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-anh','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Anh $anh){
        $anh->delete();   
    }
    
    public function render()
    {
        $anhs = Ritu::find($this->ritu->id)->anhs()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-anh',compact('anhs'));
    }
}
