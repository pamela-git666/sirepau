<?php

namespace Database\Seeders;

use App\Models\Autoridad;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Archivo::factory(20)->create();
         $this->call(DepartamentoSeeder::class);
         $this->call(ProvinciaSeeder::class);
         $this->call(MunicipioSeeder::class);
         $this->call(RolesAndPermissions::class);
         $this->call(UserSeeder::class);
         $this->call(TecnicoSeeder::class);
         $this->call(DirectorSeeder::class);
        // $this->call(TramiteSeeder::class);
       // $this->call(ResponsableSeeder::class);

       //  \App\Models\User::factory(50)->create();
        //\App\Models\Autoridad::factory(23)->create();
         //\App\Models\Especialista::factory(50)->create();
    }
}
