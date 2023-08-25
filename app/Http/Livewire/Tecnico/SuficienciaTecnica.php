<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuficienciaTecnica extends Component
{
    use WithFileUploads;
    public $tramite,$identificador,$archivo,$search;

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function render()
    {
        return view('livewire.tecnico.suficiencia-tecnica')->layout('layouts.app');
    }
}
