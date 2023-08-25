<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // dato 1
         Tecnico::create([
            'apellidos' => 'Ticona Medina',
            'nombres' => 'Ricardo Juan',
            'ci' => 76667565,
            'cargo' => 'Técnico Geodesta',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 73281459,
            'user_id'  => 3,
        ]);
        // dato 2
       Tecnico::create([
            'apellidos' => 'Salazar Patzi',
            'nombres' => 'Sthefany Fabiola',
            'ci' => 76007585,
            'cargo' => 'Técnico Regiones Metropolitanas',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 60644926,
            'user_id'  => 5,
        ]);
        // dato 3
       Tecnico::create([
            'apellidos' => 'Silva Paco',
            'nombres' => 'Josue Miguel',
            'ci' => 76067505,
            'cargo' => 'Profesional',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 76206666,
            'user_id'  => 6,
        ]);
        // dato 4
       Tecnico::create([
            'apellidos' => 'Nao Ramirez',
            'nombres' => 'Javier',
            'ci' => 76567785,
            'cargo' => 'Profesional en Organización Territorial y Regiones',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 75957878,
            'user_id'  => 7,
        ]);
        // dato 5
       Tecnico::create([
            'apellidos' => 'Aranda',
            'nombres' => 'Veronica',
            'ci' => 76567565,
            'cargo' => 'Responsable Especialista en Sistemas de Organización Geográfica y Organización Territorial',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 66457878,
            'user_id'  => 8,
        ]);
        // dato 6
       Tecnico::create([
            'apellidos' => 'Maldonado Valda',
            'nombres' => 'Luis Alvaro',
            'ci' => 76567505,
            'cargo' => 'Profesional Jurídico en Áreas Urbanas',
            'unidad' => 'Homologación de Áreas Urbanas',
            'celular' => 75757878,
            'user_id'  => 9,
        ]);

    }
}
