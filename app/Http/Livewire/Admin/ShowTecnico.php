<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tecnico;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTecnico extends Component
{
    use WithPagination;

    public $search, $tecnico;

    public function mount()
    {
        $this->tecnico = new Tecnico();
    }

    protected $listeners = ['render', 'delete'];

    public $open_edit = false;

    protected $rules = [
        'tecnico.apellidos' => 'required',
        'tecnico.nombres' => 'required',
        'tecnico.ci' => 'required',
        'tecnico.cargo' => 'required',
        'tecnico.celular' => 'required|numeric'
    ];

    public function edit(Tecnico $tecnico)
    {
        $this->tecnico = $tecnico;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->resetValidation();
        $rules = $this->rules;
        //   $rules['tecnico.ci'] = 'required|unique:tecnicos,ci,' . $this->tecnico->id;
         //Actualizar password del usuario 
        $user= User::find($this->tecnico->user_id);
        $user->password = bcrypt($this->tecnico->ci);
        $user->save();
        
        $rules = $this->rules;

        $this->validate($rules);
        //   $this->tecnico->slug = $this->tecnico->slug;

        $this->tecnico->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'Los datos del Técnico se actualizó correctamente');
    }

    public function assignRole(User $user, $value){
        
             if ($value == '1') {
                 $user->assignRole('tecnico');
             }else{
                 $user->removeRole('tecnico');
             }
 
     }

    public function render()
    {
        $tecnicos = Tecnico::where('ci','like','%'.$this->search.'%')
        ->orwhere('apellidos','like','%' . $this->search . '%')
        ->orwhere('nombres','like','%' . $this->search . '%')
        ->orwhere('cargo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.admin.show-tecnico',compact('tecnicos'))->layout('layouts.app');
    }

    public function delete(Tecnico $tecnico){
        $tecnico->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
