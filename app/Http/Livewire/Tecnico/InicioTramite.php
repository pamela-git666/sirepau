<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Initram;
use App\Models\Tramite;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InicioTramite extends Component
{
    //estado del modal
    use WithFileUploads;
    public $open = false;
    public $open_edit = false;
    public $open_documento = false;
    public $tramite,$search,$identificador,$initrams,$editArchivo,$doc;
    public $numruta,$direccion,$archivo;

    protected $listeners = ['render', 'delete'];

    //validación para formulario crear
    protected $rules = [
        'createForm.numruta' => 'required',
        'createForm.fecha' => 'required',
        'createForm.tipo' => 'required',
    ];

    protected $validationAttributes = [
        'editForm.numruta' => 'número de ruta',
        'editForm.fecha' => 'fecha',
        'editForm.tipo' => 'tipo',
        'createForm.numruta' => 'número de ruta',
        'createForm.fecha' => 'fecha',
        'createForm.tipo' => 'tipo',
    ];

    public $createForm = [
        'numruta' => null,
        'fecha' => null,
        'tipo' => null,
    ];

    public $editForm = [
        'numruta' => null,
        'fecha' => null,
        'tipo' => null,
        'file'  => null
    ];

    public function mount(Tramite $tramite){
        $this->tramite = $tramite;
        $this->identificador = rand(); 
    }

    public function save(){
        $this->validate();

        $archivo = $this->archivo->store('public/initramites');

        $initram = Initram::create([
            'numruta' => $this->createForm['numruta'],
            'fecha' => $this->createForm['fecha'],
            'tipo' => $this->createForm['tipo'],
            'archivo' => $archivo,
            'tramite_id' => $this->tramite->id
        ]);

       // $this->tramite->initrams()->create($this->createForm);
       $this->reset('createForm','open','archivo');
       $this->identificador = rand(); 
       $this->emitTo('tecnico.inicio-tramite','render');
       $this->emit('alert','el archivo se creó correctamente');
     
    }

    public function file(Initram $item){
        $this->open_documento = true;
        $this->doc = $item;
        $this->numruta = $item->numruta;
        $this->direccion = $item->archivo;
    }

    public function edit(Initram $item){
         $this->reset(['editArchivo']);

        $this->item = $item;

        $this->open_edit = true;

        $this->editForm['numruta'] = $item->numruta;
        $this->editForm['fecha'] = $item->fecha;
        $this->editForm['tipo'] = $item->tipo;
        $this->editForm['archivo'] = $item->archivo;


    }

    public function update(){
        $rules = [
            'editForm.numruta' => 'required',
            'editForm.fecha' => 'required',
            'editForm.tipo' => 'required',
        ];

        if ($this->editArchivo) {
            $rules['editArchivo'] = 'max:30720|mimes:pdf';
        }
        
        $this->validate($rules);

        if ($this->editArchivo) {
            Storage::delete($this->editForm['archivo']);
            $this->editForm['archivo'] = $this->editArchivo->store('public/initramites');
        }

        $this->item->update($this->editForm);

        $this->identificador = rand(); 

        $this->reset(['editForm', 'editArchivo','open_edit']);
    }

    

    public function render() 
    {
        $initramis = Tramite::find($this->tramite->id)->initrams()
        //->where('numruta','like','%'.$this->search.'%')
        //->orwhere('tipo','like','%' . $this->search . '%')
        ->orderByDesc('id')
        ->paginate(10);
        return view('livewire.tecnico.inicio-tramite',compact('initramis'))->layout('layouts.app');
    }

    public function delete(Initram $initram){
        $initram->delete();
    }
}

