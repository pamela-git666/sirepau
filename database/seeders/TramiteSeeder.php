<?php

namespace Database\Seeders;

use App\Models\Tramite;
use Illuminate\Database\Seeder;

class TramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //tramite1
         Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 19,
            'municipio_id' => 76,
            'centro_poblado' => 'Coro Coro',
            'no_inf' => 78,
            'fase' => 3,
            'status' => 2,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 1,
        ]);
        //tramite2
        Tramite::create([
            'departamento_id' => 9,
            'provincia_id' => 43,
            'municipio_id' => 100,
            'centro_poblado' => 'Llica',
            'no_inf' => 79,
            'fase' => 1,
            'status' => 2,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 3,
        ]);
        //tramite3
        Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 4,
            'municipio_id' => 3,
            'centro_poblado' => 'Cajuata',
            'no_inf' => 80,
            'fase' => 3,
            'status' => 3,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 4,
        ]);
        //tramite4
        Tramite::create([
            'departamento_id' => 7,
            'provincia_id' => 34,
            'municipio_id' => 45,
            'centro_poblado' => 'Cercado',
            'no_inf' => 81,
            'fase' => 4,
            'status' => 3,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 4,
        ]);
          //tramite5
          Tramite::create([
            'departamento_id' => 2,
            'provincia_id' => 6,
            'municipio_id' => 35,
            'centro_poblado' => 'Chorolque',
            'no_inf' => 82,
            'fase' => 2,
            'status' => 2,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 5,
        ]);
          //tramite6
          Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 3,
            'municipio_id' => 58,
            'centro_poblado' => 'Santiago de Machaca',
            'no_inf' => 83,
            'fase' => 3,
            'status' => 2,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 6,
        ]);
          //tramite7
          Tramite::create([
            'departamento_id' => 4,
            'provincia_id' => 16,
            'municipio_id' => 4,
            'centro_poblado' => 'San Ignacio de Moxos',
            'no_inf' => 84,
            'fase' => 2,
            'status' => 1,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 1,
        ]);
          //tramite8
          Tramite::create([
            'departamento_id' => 7,
            'provincia_id' => 32,
            'municipio_id' => 78,
            'centro_poblado' => 'El Palmar',
            'no_inf' => 85,
            'fase' => 3,
            'status' => 1,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 2,
        ]);
          //tramite9
          Tramite::create([
            'departamento_id' => 3,
            'provincia_id' => 12,
            'municipio_id' => 34,
            'centro_poblado' => 'Litoral',
            'no_inf' => 86,
            'fase' => 4,
            'status' => 3,
            'situacion' => 'El GAM debe presentar su Ley.',
            'tecnico_id' => 2,
        ]);
          //tramite10
          Tramite::create([
            'departamento_id' => 3,
            'provincia_id' => 11,
            'municipio_id' => 45,
            'centro_poblado' => 'Villa Imperial',
            'no_inf' => 87,
            'fase' => 2,
            'status' => 2,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 2,
        ]);
          //tramite11
          Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 3,
            'municipio_id' => 131,
            'centro_poblado' => 'Huaycho',
            'no_inf' => 88,
            'fase' => 3,
            'status' => 3,
            'situacion' => 'El GAM debe presentar su Ley',
            'tecnico_id' => 5,
        ]);
          //tramite12
          Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 4,
            'municipio_id' => 14,
            'centro_poblado' => 'Teoponte',
            'no_inf' => 89,
            'fase' => 2,
            'status' => 3,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 3,
        ]);
          //tramite13
          Tramite::create([
            'departamento_id' => 1,
            'provincia_id' => 4,
            'municipio_id' => 35,
            'centro_poblado' => 'Tocopilla Cantuyo',
            'no_inf' => 90,
            'fase' => 2,
            'status' => 1,
            'situacion' => 'El GAM debe subsanar su informe.',
            'tecnico_id' => 4,
        ]);
         
    }
}
