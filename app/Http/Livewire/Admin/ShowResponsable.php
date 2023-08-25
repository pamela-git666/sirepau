<?php

namespace App\Http\Livewire\Admin;

use App\Models\Responsable;
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
        'responsable.celular' => 'required|numeric',
        'responsable.desgnacion' => 'required'
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
        $responsables = Responsable::where('ci','like','%'.$this->search.'%')
        ->orwhere('apellidos','like','%' . $this->search . '%')
        ->orwhere('nombres','like','%' . $this->search . '%')
        ->orwhere('cargo','like','%' . $this->search . '%')
        ->orwhere('designacion','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.admin.show-responsable',compact('responsables'))->layout('layouts.app');
    }

    public function delete(Responsable $responsable){
        $responsable->delete();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
