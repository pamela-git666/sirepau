<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsable extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;
    //Asignación masiva
    protected $fillable = [
        'ci',
        'apellidos',
        'nombres',
        'cargo',
        'celular',
        'designacion',
        'user_id',
        'tramite_id',
    ];

          //relación uno a muchos inversa Especialista-Tramites
          public function tramite()
          {
              return $this->belongsTo(Tramite::class);
          }

          
    //relación uno a uno inversa use-responsable
    public function user()
    {
        return $this->belongsTo(User::class);
    }
      
}
