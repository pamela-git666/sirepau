<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'departamento_id',
    ];

    //Relacion uno a muchos inversa Departamento-provincias
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

      //Relación uno a muchos especialista-tramites
      public function municipios()
      {
         return $this->hasMany(Municipio::class);
      }

     //relaciòn uno a uno autorida-tramite
     public function tramite()
     {
         return $this->hasOne(Tramite::class);
     }
}
