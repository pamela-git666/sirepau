<?php

namespace App\Http\Livewire\Tecnico;

use App\Models\Ast;
use App\Models\Tramite;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowAst extends Component
{
    use WithFileUploads;
    public $tramite, $ast,$identificador,$archivo,$search;

    public $open = false;

    public $open_edit = false;

    protected $rules = [
        'ast.numruta' => 'required',
        'ast.fecha' => 'required',
        'ast.observacion' => 'required'
    ];

    protected $listeners = ['delete','render'];

    public function mount(Tramite $tramite)
    {
        $this->tramite = $tramite;
        $this->identificador = rand();
    }

    public function edit(Ast $ast)
    {
        $this->ast = $ast;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;

        $this->validate($rules);

        if ($this->archivo) {
           Storage::delete($this->ast->archivo);
           $this->ast->archivo = $this->archivo->store('public/ast');
           
        }

        $this->ast->save();

        $this->reset(['open_edit']);
        $this->emitTo('tecnico.show-ast','render');
        $this->emit('alert', 'El documento se actualizó correctamente','render');
    }

    public function delete(Ast $ast){
        $ast->delete();
        
    }

    public function render()
    {
        $asts = Tramite::find($this->tramite->id)->asts()
        ->where('numruta','like','%'.$this->search.'%')
        ->orderByDesc('id')
        ->paginate(10);
        return view('livewire.tecnico.show-ast',compact('asts'))->layout('layouts.app');
    }
}
