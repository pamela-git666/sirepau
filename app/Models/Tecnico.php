<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'apellidos',
        'nombres',
        'ci',
        'cargo',
        'unidad',
        'celular',
        'user_id',
    ];
    //Relacion uno a uno inversa usuarios-tecnicos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //Relación uno a muchos especialista-tramites
     public function tramites()
     {
         return $this->hasMany(Tramite::class);
     }
 
}
