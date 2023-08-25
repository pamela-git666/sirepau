<?php

namespace App\Models;

use App\Models\Entidades\Abt;
use App\Models\Entidades\Ae;
use App\Models\Entidades\Ajam;
use App\Models\Entidades\Anh;
use App\Models\Entidades\Ine;
use App\Models\Entidades\Inra;
use App\Models\Entidades\Sernap;
use App\Models\Entidades\Vicemintierra;
use App\Models\Entidades\Viceminviv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tramite extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;
    //Asignación masiva
    protected $fillable = [
        'departamento_id',
        'provincia_id',
        'municipio_id',
        'centro_poblado',
        'no_inf',
        'situacion',
        'tecnico_id',
        'autoridad_id',
        'status',
        'fase',

    ];

    //constructor de las opciones de status 
    const PRE = 1;  //Preparatoria
    const INI = 2; //Inicio
    const ANA = 3; //Analisis
    const EMI = 4; //Emisión de Resolución

    //relación uno a muchos inversa Especialista-Tramites
    public function especialista()
    {
        return $this->belongsTo(Especialista::class);
    }

    //relación uno a muchos inversa Especialista-Tramites
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion inversa uno a uno Autoridad-Departament
    public function Departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    //relacion inversa uno a uno Autoridad-Provincia
    public function Provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    //relacion inversa uno a uno Autoridad-Provincia
    public function Municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    //Relación uno a muchos tramite-documentos
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    //Relación uno a muchos tramite-ritu
    public function ritus()
    {
        return $this->hasMany(Ritu::class);
    }

    //Relación uno a muchos tramite-responsables
    public function responsables()
    {
        return $this->hasMany(Responsable::class);
    }

    //Relación uno a muchos tramite-inicio de tramites
    public function infbases()
    {
        return $this->hasMany(Infbase::class);
    }

    //Relación uno a muchos tramite-inicio de tramites
    public function initrams()
    {
        return $this->hasMany(Initram::class);
    }

    //Relación uno a muchos tramite-abts de tramites
    public function itus()
    {
        return $this->hasMany(Itu::class);
    }

    //Relación uno a muchos tramite-abts de tramites
    public function abts()
    {
        return $this->hasMany(Abt::class);
    }

    //Relación uno a muchos tramite-aes de tramites
    public function aes()
    {
        return $this->hasMany(Ae::class);
    }

    //Relación uno a muchos tramite-ajam de tramites
    public function ajams()
    {
        return $this->hasMany(Ajam::class);
    }

    //Relación uno a muchos tramite-anh de tramites
    public function anhs()
    {
        return $this->hasMany(Anh::class);
    }


    //Relación uno a muchos tramite-analisis de suficiencia tecnica de tramites
    public function asts()
    {
        return $this->hasMany(Ast::class);
    }

    //Relación uno a muchos tramite-analisis de suficiencia tecnica de tramites
    public function leylimitacions()
    {
        return $this->hasMany(Leylimitacion::class);
    }

    //Relación uno a muchos tramite-analisis de suficiencia tecnica de tramites
    public function acls()
    {
        return $this->hasMany(Acl::class);
    }

    //Relación uno a muchos tramite-analisis de suficiencia tecnica de tramites
    public function homologacions()
    {
        return $this->hasMany(Homologacion::class);
    }

    //Relación uno a muchos tramite-ine de tramites
    public function ines()
    {
        return $this->hasMany(Ine::class);
    }

    //Relación uno a muchos tramite-inra de tramites
    public function inras()
    {
        return $this->hasMany(Inra::class);
    }

    //Relación uno a muchos tramite-sernap de tramites
    public function sernaps()
    {
        return $this->hasMany(Sernap::class);
    }

    //Relación uno a muchos tramite-vicemintierras de tramites
    public function vicemintierras()
    {
        return $this->hasMany(Vicemintierra::class);
    }

    //Relación uno a muchos tramite-viceminviv de tramites
    public function viceminvivs()
    {
        return $this->hasMany(Viceminviv::class);
    }
       //Relación uno a muchos tramite-ist de tramites
    public function ists()
    {
        return $this->hasMany(Ist::class);
    }

    public function resadmins()
    {
        return $this->hasMany(Resadmin::class);
    }


}
