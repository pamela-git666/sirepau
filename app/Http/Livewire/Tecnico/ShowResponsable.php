<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Responsable;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithPagination;

class ShowResponsable extends Component
{
    use WithPagination;

    public $search,$responsable;

    public function mount()
    {
        $this->responsable = new Responsable();
    }

    protected $listeners = ['render', 'delete'];

    public $open_edit = false;

    protected $rules = [
        'responsable.ci' => 'required',
        'responsable.apellidos' => 'required',
        'responsable.nombres' => 'required',
        'responsable.cargo' => 'required',
        'responsable.celular' => 'required|numeric'
    ];

    public function edit(Responsable $responsable)
    {
        $this->responsable = $responsable;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->resetValidation();
        $rules = $this->rules;
      //   $rules['autoridad.ci'] = 'required|unique:autoridads,ci,' . $this->autoridad->id;
 
       $rules = $this->rules;

        $this->validate($rules);
     //   $this->autoridad->slug = $this->autoridad->slug;

        $this->responsable->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El responsable se actualizó correctamente');
    }

    public function render()
    {
        $tramite =Tramite::where('tecnico_id',auth()->user()->tecnico->id);

        $responsables = Tramite::find($tramite->id)->responsables()
        ->where('ci','like','%'.$this->search.'%')
        ->orwhere('apellidos','like','%' . $this->search . '%')
        ->orwhere('nombres','like','%' . $this->search . '%')
        ->orwhere('cargo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.tecnico.show-responsable'.compact('responsables'))->layout('layouts.app');
    }
}
