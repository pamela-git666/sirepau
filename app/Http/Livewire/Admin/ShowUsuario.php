<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsuario extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')
        ->orwhere('email', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('livewire.admin.show-usuario',compact('usuarios'))->layout('layouts.app');
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
