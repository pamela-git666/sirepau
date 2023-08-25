<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Inra;
use App\Models\Ritu;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowInra extends Component
{
    use WithFileUploads;
    public $ritu, $inra,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'inra.numruta' => 'required',
        'inra.fecha' => 'required',
        'inra.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Ritu $ritu)
    {
        $this->ritu = $ritu;
        $this->identificador = rand();
    }

    public function edit(Inra $inra)
    {
        $this->inra = $inra;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->inra->archivo);
           $this->inra->archivo = $this->archivo->store('public/inra');
        }

        $this->inra->save();

        $this->reset(['open_edit']);
        $this->emitTo('entidades.show-inra','render');
        $this->emit('alert', 'El registro se actualizó correctamente','render');
    }

    public function delete(Inra $inra){
        $inra->delete();
        
    }
    
    public function render()
    {
        $inras = Ritu::find($this->ritu->id)->inras()
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.entidades.show-inra',compact('inras'));
    }
}
