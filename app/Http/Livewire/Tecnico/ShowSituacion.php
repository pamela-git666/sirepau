<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Tramite;
use Livewire\Component;

class ShowSituacion extends Component
{
    public $tramite,$rand;
    
    public $open = false;

    public $createForm = [
        'situacion' => null,
    ];

    public $editForm = [
        'open' => false,
        'situacion' => null,
    ];

    protected $validationAttributes = [
       
        'createForm.situacion' => 'situación',
        'editForm.situacion' => 'situación',
    ];

    public function save(Tramite $tramite)
    {
        $this->validate();

        $this->tramite->situacion =  $this->createForm['situacion'];

        $this->tramite->save();

        $this->rand = rand();
        $this->reset('createForm');

        $this->emit('saved');
        $this->tramite = $this->tramite->fresh();
    }

    public function edit(Tramite $tramite)
    {
        $this->open = true;
        $this->tramite = $tramite;

        $this->editForm['open'] = true;
        $this->editForm['situacion'] = $tramite->situacion;
    }

    public function update()
    {

        $rules = [
            'editForm.situacion' => 'required',
        ];

        $this->validate($rules);


        $this->tramite->update($this->editForm);


        $this->tramite = $this->tramite->fresh();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.tecnico.show-situacion');
    }
    
}
