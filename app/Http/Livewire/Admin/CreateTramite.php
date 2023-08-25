<?php

namespace App\Http\Livewire\Admin;

use App\Models\Departamento;
use App\Models\Mensaje;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Tecnico;
use App\Models\Tramite;
use App\Models\User;
use Livewire\Component;

class CreateTramite extends Component
{
    //estado del modal
    public $open = false;
    public $departamentos;
    public $provincias;
    public $municipios;
    public $selectedDepartamento = null;
    public $selectedProvincia = null;
    public $selectedMunicipio = null;
    public $centro_poblado, $no_inf, $situacion;
    public $tecnico_id, $item;

    //reglas de validaciòn del formulario
    protected $rules = [
        'selectedDepartamento' => 'required',
        'selectedProvincia' => 'required',
        'selectedMunicipio' => 'required',
        'centro_poblado' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
        'no_inf' => 'required|numeric',
        'situacion' => 'required|max:30',
        'tecnico_id' => 'required',

    ];

    //cambio de atributos para el formulario
    protected $validationAttributes = [
        'selectedDepartamento' => 'departamento',
        'selectedProvincia' => 'provincia',
        'selectedMunicipio' => 'municipio',
        'centro_poblado' => 'centro poblado',
        'no_inf' => 'N° Informe',
    ];
    //guarda los datos
    public function save()
    {
        $this->validate();
        $tecnico = Tecnico::find($this->tecnico_id);
        $user = User::find($tecnico->user_id);

       $tramite = Tramite::create([
            'departamento_id' => $this->selectedDepartamento,
            'provincia_id' => $this->selectedProvincia,
            'municipio_id' => $this->selectedMunicipio,
            'centro_poblado' => $this->centro_poblado,
            'no_inf' => $this->no_inf,
            'situacion' => $this->situacion,
            'tecnico_id' => $this->tecnico_id,
        ]);

        $tecnico = Tecnico::find($this->tecnico_id);
        $user = User::find($tecnico->user_id);

        Mensaje::create([
            'status' => '1',
            'mensaje' => '1',
            'tramite_id' => $tramite->id,
            'user_id' => $user->id
        ]);


        $this->reset(['open', 'selectedDepartamento', 'selectedProvincia', 'selectedMunicipio', 'centro_poblado', 'no_inf', 'situacion', 'tecnico_id']);
        $this->emitTo('admin.show-tramite', 'render');
        $this->emit('alert', 'el Trámite se creó correctamente');
    }

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
        $tecnicos = Tecnico::all();
        return view('livewire.admin.create-tramite', compact('tecnicos'));
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
}
