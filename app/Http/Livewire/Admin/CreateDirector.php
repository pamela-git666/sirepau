<?php

namespace App\Http\Livewire\Admin;

use App\Models\Director;
use App\Models\User;
use Livewire\Component;

class CreateDirector extends Component
{
     //estado del modal
     public $open = false;
     public $ci,$apellidos,$nombres,$cargo,$celular,$email;
 
 //reglas de validaciòn del formulario
     protected $rules = [
         'ci' => 'required|alpha_num|min:5|max:10|unique:directors,ci,',
         'nombres' =>'required|regex:/^[\pL\s\-]+$/u|max:30',
         'apellidos' =>'required|regex:/^[\pL\s\-]+$/u|max:30',
         'cargo' =>'required',
         'email' =>'required|string|email|max:255|unique:users',
         'celular' =>'required|numeric|min:60000000|max:9000000000',
     ]; 
 //guarda los datos
     public function save(){
         $this->validate();
         $user = User::create([
             'name' => $this->nombres,
             'email'=> $this->email,
             'password' => bcrypt($this->ci)
 
         ])->assignRole('administrador');
         
         Director::create([
           'ci' => $this->ci,
           'apellidos' => $this->apellidos,
           'nombres' => $this->nombres,
           'cargo' => $this->cargo,
           'celular' => $this->celular,
           'user_id' => $user->id,
         ]);
 
         $this->reset(['open','ci','apellidos','nombres','cargo','celular']);
 
         $this->emitTo('admin.show-director','render');
         $this->emit('alert','El administrador se creó correctamente');
 
     }
 
    public function render()
    {
        return view('livewire.admin.create-director');
    }
}
