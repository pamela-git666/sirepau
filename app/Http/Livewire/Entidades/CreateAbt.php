<?php

namespace App\Http\Livewire\Entidades;

use App\Models\Entidades\Abt;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAbt extends Component
{
    use WithFileUploads;
    public $open = false;
    public $ritu, $numruta, $fecha, $observacion, $archivo, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'numruta' => 'required',
        'fecha' => 'required',
        'observacion' => 'required',
    ];

    public function save()
    {
        $this->validate();

        if ($this->archivo) {

            $archivo = $this->archivo->store('public/abt');

            Abt::create([
                'numruta' => $this->numruta,
                'fecha' => $this->fecha,
                'observacion' => $this->observacion,
                'archivo' => $archivo,
                'ritu_id' => $this->ritu->id,
            ]);

            $this->reset(['open', 'numruta', 'fecha', 'observacion', 'archivo']);

            $this->identificador = rand();

            $this->emit('alert', 'El documento se creó correctamente');

            return redirect()->route('entidad.index', $this->ritu);
        } else { 
            Abt::create([
                'numruta' => $this->numruta,
                'fecha' => $this->fecha,
                'observacion' => $this->observacion,
                'ritu_id' => $this->ritu->id,
            ]);

            $this->reset(['open', 'numruta', 'fecha', 'observacion']);

            $this->identificador = rand();
            return redirect()->route('entidad.index', $this->ritu);
            $this->emit('alert', 'El documento se creó correctamente');
        }
    }

    public function render()
    {
        return view('livewire.entidades.create-abt');
    }
}
