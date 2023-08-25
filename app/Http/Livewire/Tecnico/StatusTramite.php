<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Tramite;
use Livewire\Component;

class StatusTramite extends Component
{
    public $tramite, $fase; 

    public $open = false;

    protected $listeners = ['render'];

    public function mount(){
        $this->fase = $this->tramite->fase;
    }

    public function update(){
        if ($this->tramite->fase == 1 && $this->fase == 2) {
            $this->tramite->fase = $this->fase;
            $this->tramite->save();
        } elseif($this->tramite->fase == 2 && $this->fase == 3) {
            $this->tramite->fase = $this->fase;
            $this->tramite->save();
        } elseif($this->tramite->fase == 3 && $this->fase == 4){
            $this->tramite->fase = $this->fase;
            $this->tramite->save();
        }else{
            $this->open = true; 
            $this->emit('tecnico.status-tramite','render');
        }
        
    }

    public function render()
    {
        return view('livewire.tecnico.status-tramite');
    }
}
