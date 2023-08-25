<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dato 1
        Director::create([
            'ci' => 70067565,
            'apellidos' => 'Ruiz Garcia',
            'nombres' => 'Alvaro',
            'cargo' => 'Viceministro de Autonomias',
            'celular' => 74075778,
            'user_id'  => 2,
        ]);
        // dato 2
        Director::create([
            'ci' => 76000085,
            'apellidos' => 'Navajas',
            'nombres' => 'Miguel Alberto',
            'cargo' => 'Director General de Autonomías',
            'celular' => 64577878,
            'user_id'  => 10,
        ]);
        // dato 3
        Director::create([
            'ci' => 76067000,
            'apellidos' => 'Calderón Russo',
            'nombres' => 'Wilhem Flavio',
            'cargo' => 'Jefe De Unidad De Areas Urbanas Y Metropolizacion',
            'celular' => 64757878,
            'user_id'  => 11,
        ]);
    }
}
