<?php

namespace App\Http\Livewire\Admin;
use App\Models\Archivo;

use Livewire\Component;
use Livewire\WithPagination;

class ShowArchivo extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        $archivos = Archivo::where('nombre', 'like', '%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);
        return view('livewire.admin.show-archivo',compact('archivos'))->layout('layouts.app');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
