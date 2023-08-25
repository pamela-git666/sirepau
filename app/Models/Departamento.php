<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    //Relación uno a muchos especialista-tramites
    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }

    //relaciòn uno a uno autorida-tramite
    public function tramite()
    {
        return $this->hasOne(Tramite::class);
    }
}
