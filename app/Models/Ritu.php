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

class Ritu extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;

    //Asignación masiva
    protected $fillable = [
        'numruta',
        'nombre',
        'fecha',
        'archivo',
        'observacion',
        'tramite_id',
    ];

     //Relación uno a muchos tramite-ritu INVERSA
     public function tramite()
     {
         return $this->belongsTo(Tramite::class);
     }

     //Relación uno a muchos ritu-abts de tramites
    public function abts()
    {
        return $this->hasMany(Abt::class);
    }
   
    //Relación uno a muchos ritu-aes de tramites
    public function aes()
    {
        return $this->hasMany(Ae::class);
    }

      //Relación uno a muchos ritu-ajam de tramites
      public function ajams()
      {
          return $this->hasMany(Ajam::class);
      }

        //Relación uno a muchos ritu-anh de tramites
    public function anhs()
    {
        return $this->hasMany(Anh::class);
    }

      //Relación uno a muchos ritu-ine de tramites
      public function ines()
      {
          return $this->hasMany(Ine::class);
      }

        //Relación uno a muchos ritu-inra de tramites
    public function inras()
    {
        return $this->hasMany(Inra::class);
    }

      //Relación uno a muchos ritu-sernap de tramites
      public function sernaps()
      {
          return $this->hasMany(Sernap::class);
      }

        //Relación uno a muchos ritu-vicemintierras de tramites
    public function vicemintierras()
    {
        return $this->hasMany(Vicemintierra::class);
    }

      //Relación uno a muchos tramite-viceminviv de tramites
      public function viceminvivs()
      {
          return $this->hasMany(Viceminviv::class);
      }

}
