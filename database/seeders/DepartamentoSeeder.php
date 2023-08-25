<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'nombre' => 'La Paz'
        ]);

        Departamento::create([
            'nombre' => 'Cochabamba'
        ]);

        Departamento::create([
            'nombre' => 'Santa Cruz'
        ]);

        Departamento::create([
            'nombre' => 'Beni'
        ]);

        Departamento::create([
            'nombre' => 'Pando'
        ]);

        Departamento::create([
            'nombre' => 'Oruro'
        ]);

        Departamento::create([
            'nombre' => 'Tarija'
        ]);

        Departamento::create([
            'nombre' => 'Chuquisaca'
        ]);

        Departamento::create([
            'nombre' => 'Potosi'
        ]);
    }
}
