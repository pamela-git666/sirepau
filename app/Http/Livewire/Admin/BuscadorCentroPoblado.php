<?php

namespace App\Http\Livewire\Admin;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Tramite;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorCentroPoblado extends Component
{
    use WithPagination;
    public $search;
    public $departamentos;
    public $provincias;
    public $municipios;
    public $selectedDepartamento = null;
    public $selectedProvincia = null;
    public $selectedMunicipio = null;

    
    protected $listeners = ['render'];

    public function mount($selectedMunicipio = null)
    {
        $this->departamentos = Departamento::all();
        $this->provincias = collect();
        $this->municipios = collect();
        $this->selectedMunicipio = $selectedMunicipio;

        if (!is_null($selectedMunicipio)) {
            $municipio = Municipio::with('provincia.departamento')->find($selectedMunicipio);
            if ($municipio) {
                $this->municipios = Municipio::where('provincia_id', $municipio->selectedProvincia)->get();
                $this->provincias = Provincia::where('departamento_id', $municipio->provincia->selectedDepartamento)->get();
                $this->selectedDepartamento = $municipio->provincia->selectedDepartamento;
                $this->selectedProvincia = $municipio->selectedProvincia;
            }
        }
    }

    
    public function render()
    {
        $se = $this->search; 
        $departamentos = Departamento::all();

        if ($this->selectedDepartamento && $this->selectedProvincia && $this->selectedMunicipio && $this->search) {
            $tramits = Tramite::where('departamento_id',$this->selectedDepartamento)
            ->where('provincia_id',$this->selectedProvincia)
            ->where('municipio_id',$this->selectedMunicipio)
            ->where('centro_poblado','like','%' . $this->search . '%')->get();

            return view('livewire.admin.buscador-centro-poblado',compact('departamentos','se','tramits'));
        }
        elseif($this->selectedDepartamento && $this->selectedProvincia && $this->selectedMunicipio) {
            $tramits = Tramite::where('departamento_id',$this->selectedDepartamento)
            ->where('provincia_id',$this->selectedProvincia)
            ->where('municipio_id',$this->selectedMunicipio)->get();

            return view('livewire.admin.buscador-centro-poblado',compact('departamentos','se','tramits'));
        }elseif($this->selectedDepartamento && $this->selectedProvincia){
            $tramits = Tramite::where('departamento_id',$this->selectedDepartamento)
            ->where('provincia_id',$this->selectedProvincia)
            ->get();
 
            return view('livewire.admin.buscador-centro-poblado',compact('departamentos','se','tramits')); 
        }elseif($this->selectedDepartamento){
            $tramits = Tramite::where('departamento_id',$this->selectedDepartamento)
            ->where('centro_poblado','like','%' . $this->search . '%')
            ->get();

            return view('livewire.admin.buscador-centro-poblado',compact('departamentos','se','tramits')); 
        }elseif($this->search){
            $tramits = Tramite::where('centro_poblado','like','%' . $this->search . '%')
            ->get();    
            return view('livewire.admin.buscador-centro-poblado',compact('departamentos','se','tramits')); 
        }
        else{
            $tramits = null;

                return view('livewire.admin.buscador-centro-poblado',compact('departamentos','tramits')); 
      
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

    public function limpiarBuscador(){
         $this->reset(['selectedDepartamento','selectedMunicipio','selectedProvincia','search']);
         $this->selectedDepartamento = null;
         $this->selectedProvincia = null;
         $this->selectedMunicipio = null;
         $this->emitTo('admin.buscador-centro-poblado','render');
    }

}
