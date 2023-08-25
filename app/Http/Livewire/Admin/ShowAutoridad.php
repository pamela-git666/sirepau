<?php

namespace App\Http\Livewire\Admin;

use App\Models\Autoridad;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAutoridad extends Component
{
    use WithPagination;

    public $search,$autoridad;

    public function mount()
    {
        $this->autoridad = new Autoridad();
    }

    protected $listeners = ['render', 'delete'];

    public $open_edit = false;

    protected $rules = [
        'autoridad.ci' => 'required',
        'autoridad.apellidos' => 'required',
        'autoridad.nombres' => 'required',
        'autoridad.cargo' => 'required',
        'autoridad.telefono' => 'required|numeric'
    ];

    public function edit(Autoridad $autoridad)
    {
        $this->autoridad = $autoridad;
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

        $this->autoridad->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El usuario se actualizó correctamente');
    }


    public function render()
    {
        $autoridades = Autoridad::where('ci','like','%'.$this->search.'%')
        ->orwhere('apellidos','like','%' . $this->search . '%')
        ->orwhere('nombres','like','%' . $this->search . '%')
        ->orwhere('cargo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.admin.show-autoridad',compact('autoridades'))->layout('layouts.app');
    }
    
    public function delete(Autoridad $autoridad){
        $autoridad->delete();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
