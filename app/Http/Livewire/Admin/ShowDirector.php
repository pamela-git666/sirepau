<?php

namespace App\Http\Livewire\Admin;

use App\Models\Director;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDirector extends Component
{
    use WithPagination;

    public $search,$director;

    public function mount()
    {
        $this->director = new Director();
    }

    protected $listeners = ['render', 'delete'];

    public $open_edit = false;

    protected $rules = [
        'director.ci' => 'required',
        'director.apellidos' => 'required',
        'director.nombres' => 'required',
        'director.cargo' => 'required',
        'director.celular' => 'required|numeric'
    ];

    public function edit(Director $director)
    {
        $this->director = $director;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->resetValidation();
        $rules = $this->rules;
      //   $rules['director.ci'] = 'required|unique:directors,ci,' . $this->director->id;
 
       $rules = $this->rules;

        $this->validate($rules);
     //   $this->director->slug = $this->director->slug;

        $this->director->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El director se actualizó correctamente');
    }

    public function render()
    {
        $directores = Director::where('ci','like','%'.$this->search.'%')
        ->orwhere('apellidos','like','%' . $this->search . '%')
        ->orwhere('nombres','like','%' . $this->search . '%')
        ->orwhere('cargo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.admin.show-director',compact('directores'))->layout('layouts.app');
    }
    public function delete(Director $director){
        $director->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
