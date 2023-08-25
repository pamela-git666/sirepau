<?php

namespace App\Http\Livewire\Admin;

use App\Models\Responsable;
use App\Models\User;
use Livewire\Component;

class CreateResponsable extends Component
{
     //estado del modal
     public $open = false;
     public $abrir_agregar = 0;
     public $ci,$apellidos,$nombres,$cargo,$celular,$designacion,$email,$tramite;

     //reglas de validaciòn del formulario
     protected $rules = [
        'createForm.apellidos' =>'required|regex:/^[\pL\s\-]+$/u|max:30',
        'createForm.nombres' =>'required|regex:/^[\pL\s\-]+$/u|max:30',
        'createForm.ci' => 'required|alpha_num|min:5|max:10|unique:responsables,ci,',
        'createForm.cargo' =>'required',
        'createForm.email' =>'required|string|email|max:255',
        'createForm.celular' =>'required|numeric|min:60000000|max:9000000000',
        'createForm.designacion' =>'required',
    ]; 

    protected $validationAttributes = [
        'createForm.apellidos' => 'Apellidos',
        'createForm.nombres' => 'Nombres',
        'createForm.ci' => 'C.I.',
        'createForm.cargo' => 'Cargo',
        'createForm.email' => 'Email',
        'createForm.celular' => 'Número de Celular',
        'createForm.designacion' => 'Designación',
    ];

    public $createForm = [
        'apellidos' => null,
        'nombres' => null,
        'ci' => null,
        'cargo' => null,
        'email' => null,
        'celular' => null,
        'designacion' => null,
    ];

     //guarda los datos
     public function save(){
        $this->validate();
        $user = User::create([
            'name' => $this->createForm['nombres'],
            'email'=> $this->createForm['email'],
            'password' => bcrypt($this->createForm['ci'])

        ])->assignRole('solicitante');
        
        Responsable::create([
          'ci' => $this->createForm['ci'],
          'apellidos' => $this->createForm['apellidos'],
          'nombres' => $this->createForm['nombres'],
          'cargo' => $this->createForm['cargo'],
          'celular' => $this->createForm['celular'],
          'designacion' => $this->createForm['designacion'],
          'user_id' => $user->id,
          'tramite_id' => $this->tramite->id,
        ]);

        $this->reset(['open','createForm','abrir_agregar']);

        $this->emitTo('admin.create-responsable','render');
        $this->emit('alert','El usuario se creó correctamente');

    }

    public function render()
    {
        $tramite = $this->tramite;
        return view('livewire.admin.create-responsable',compact('tramite'));
    }
    
    public function delete(Responsable $responsable)
    {
        $responsable->delete();
        $this->reset(['open','createForm','abrir_agregar']);
    }
}
