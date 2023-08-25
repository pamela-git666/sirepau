<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Tecnico;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTramite extends Component
{
    use WithPagination;

    public $search, $tramite;
    public $departamento_id, $municipio_id, $provincia_id;
    public $provincias, $municipios;
    public $prueba, $prueba2, $prueba3;


    protected $listeners = ['render', 'delete'];

    public $open_edit = false;

    protected $rules = [
        'tramite.no_inf' => 'required',
        'departamento_id' => 'required',
        'provincia_id' => 'required',
        'municipio_id' => 'required',
        'tramite.centro_poblado' => 'required',
        'tramite.situacion' => 'required'
    ];

    public function edit(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->open_edit = true;
        $this->departamento_id = $this->tramite->departamento_id;
        $this->provincia_id = $this->tramite->provincia_id;
        $this->municipio_id = $this->tramite->municipio_id;
        $this->provincias = Provincia::all();
        $this->municipios = Municipio::all();
    }

    public function updatedDepartamentoId()
    {
        $this->provincias = Provincia::where('departamento_id', $this->departamento_id)->get();
    }

    public function updatedProvinciaId()
    {
        $this->municipios = Municipio::where('provincia_id', $this->provincia_id)->get();

        $this->prueba3 = Provincia::select('departamentos.id')
        ->join('departamentos', 'departamentos.id', '=', 'provincias.departamento_id')
        ->where('provincias.id', $this->provincia_id)
        ->first();

        $this->departamento_id = $this->prueba3->id;
    }  

    public function updatedMunicipioId()
    {
        $this->prueba = Municipio::select( 'provincias.id')
        ->join('provincias', 'provincias.id', '=', 'municipios.provincia_id')
        ->where('municipios.id', $this->municipio_id)
        ->first();

        $this->provincia_id = $this->prueba->id; 
        $this->provincias = Provincia::all();

        $this->prueba2 = Provincia::select('departamentos.id')
        ->join('departamentos', 'departamentos.id', '=', 'provincias.departamento_id')
        ->where('provincias.id', $this->provincia_id)
        ->first();

        $this->departamento_id = $this->prueba2->id;
    }

    public function mount()
    {
        $this->provincias = Provincia::all();
        $this->municipios = Municipio::all();
    }

    public function update()
    {
        $this->resetValidation();
        $rules = $this->rules;
        //   $rules['tramite.ci'] = 'required|unique:tramites,ci,' . $this->tramite->id;

        $rules = $this->rules;

        $this->validate($rules);
        //   $this->tramite->slug = $this->tramite->slug;

        $this->tramite->departamento_id = $this->departamento_id;
        $this->tramite->provincia_id = $this->provincia_id;
        $this->tramite->municipio_id =  $this->municipio_id;

        $this->tramite->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El tramite se actualizó correctamente');
    }

    public function render()
    {
       $departamentos = Departamento::all();

       $tramites = Tecnico::find(auth()->user()->tecnico->id)->tramites()
       ->where('no_inf','like','%'.$this->search.'%')
       ->orderByDesc('id')
       ->paginate(10);

        return view('livewire.tecnico.show-tramite',compact('tramites','departamentos'))->layout('layouts.app');
    }

    public function updatedDepartamento_id($departamento)
    {
        $this->provincias = Provincia::where('departamento_id', $departamento)->get();
        $this->provincia_id = NULL;
    }

    public function updatedProvincia_id($provincia)
    {
        if (!is_null($provincia)) {
            $this->municipios = Municipio::where('provincia_id', $provincia)->get();
        }
    }
    public function updatedSelectedDepartamento($departamento)
    {
        $this->provincias = Provincia::where('departamento_id', $departamento)->get();
        $this->selectedProvincia = NULL;
    }

    public function updatedSelectedProvincia($provincia)
    {
        if (!is_null($provincia)) {
            $this->municipios = Municipio::where('provincia_id', $provincia)->get();
        }
    }


    public function delete(Tramite $tramite)
    {
        $tramite->delete();
    }
}
