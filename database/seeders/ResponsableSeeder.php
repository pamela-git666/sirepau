<?php

namespace Database\Seeders;

use App\Models\Responsable;
use Illuminate\Database\Seeder;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dato 1
        Responsable::create([
            'ci' => 76689665,
            'apellidos' => 'Gutierrez ',
            'nombres' => 'Juan Carlos',
            'cargo' => 'Alcalde',
            'celular' => 74575778,
            'designacion' => 'GAM',
            'user_id'  => 4,
            'tramite_id' => 1,
        ]);
        // dato 2
        Responsable::create([
            'ci' => 86007585,
            'apellidos' => 'Baltazar Perez ',
            'nombres' => 'Pedro Juan',
            'cargo' => 'Concejal',
            'celular' => 64577878,
            'designacion' => 'GAM',
            'user_id'  => 12,
            'tramite_id' => 2,
        ]);
        // dato 3
        Responsable::create([
            'ci' => 86007505,
            'apellidos' => 'Hinojosa Salazar ',
            'nombres' => 'Estrella',
            'cargo' => 'Concejal',
            'celular' => 64757878,
            'designacion' => 'GAM',
            'user_id'  => 13,
            'tramite_id' => 3,
        ]);
        // dato 4
        Responsable::create([
            'ci' => 8000505,
            'apellidos' => 'Calle Salazar ',
            'nombres' => 'Pamela',
            'cargo' => 'Alcalde',
            'celular' => 64757878,
            'designacion' => 'GAIOCS',
            'user_id'  => 14,
            'tramite_id' => 4,
        ]);

        // dato 5
        Responsable::create([
            'ci' => 86000000,
            'apellidos' => 'Choque Chuy',
            'nombres' => 'Anastacio',
            'cargo' => 'Alcalde',
            'celular' => 64757878,
            'designacion' => 'GAM',
            'user_id'  => 15,
            'tramite_id' => 5,
        ]);

        // dato 6
        Responsable::create([
            'ci' => 86000050,
            'apellidos' => 'Llanqui Apaza',
            'nombres' => 'Samuel',
            'cargo' => 'Concejal',
            'celular' => 64757878,
            'designacion' => 'GAM',
            'user_id'  => 16,
            'tramite_id' => 6,
        ]);

        // dato 7
        Responsable::create([
            'ci' => 80000000,
            'apellidos' => 'Pachi Guzman',
            'nombres' => 'Daner',
            'cargo' => 'Alcalde',
            'celular' => 64757878,
            'designacion' => 'GAIOCS',
            'user_id'  => 17,
            'tramite_id' => 7,
        ]);

        // dato 8
        Responsable::create([
            'ci' => 80000001,
            'apellidos' => 'Abrego Guzman',
            'nombres' => 'Luis',
            'cargo' => 'Concejal',
            'celular' => 64847878,
            'designacion' => 'GAIOCS',
            'user_id'  => 18,
            'tramite_id' => 8,
        ]);

        // dato 9
        Responsable::create([
            'ci' => 80000091,
            'apellidos' => 'Ticona Ticona',
            'nombres' => 'Maria',
            'cargo' => 'Concejal',
            'celular' => 64847878,
            'designacion' => 'GAM',
            'user_id'  => 19,
            'tramite_id' => 9,
        ]);

        // dato 10
        Responsable::create([
            'ci' => 80000191,
            'apellidos' => 'Vaca Perez',
            'nombres' => 'Maria Juana',
            'cargo' => 'Alcalde',
            'celular' => 64847878,
            'designacion' => 'GAIOCS',
            'user_id'  => 20,
            'tramite_id' => 10,
        ]);
        // dato 11
        Responsable::create([
            'ci' => 80009191,
            'apellidos' => 'Vaca Villazan',
            'nombres' => 'Esther',
            'cargo' => 'Alcalde',
            'celular' => 64847878,
            'designacion' => 'GAIOCS',
            'user_id'  => 21,
            'tramite_id' => 11,
        ]);

         // dato 12
         Responsable::create([
            'ci' => 80709191,
            'apellidos' => 'Fernandez Flores',
            'nombres' => 'Esther',
            'cargo' => 'Concejal',
            'celular' => 64847878,
            'designacion' => 'GAIOCS',
            'user_id'  => 22,
            'tramite_id' => 12,
        ]);
         // dato 13
         Responsable::create([
            'ci' => 80709100,
            'apellidos' => 'Fernandez Vasquez',
            'nombres' => 'Carlos',
            'cargo' => 'Alcalde',
            'celular' => 64847878,
            'designacion' => 'GAM',
            'user_id'  => 23,
            'tramite_id' => 13,
        ]);
    }
}
