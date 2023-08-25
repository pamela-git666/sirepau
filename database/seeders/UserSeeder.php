<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Desarrolladores
        $superadmin = User::create([
            'name' => 'desarrollador',
            'email' => 'desarrollador@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $superadmin->assignRole('super-admin');

        //Ejecutivo(Viceministro- Director General )
        $admin = User::create([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('ejecutivo');

        //Tecnico
        $especialista = User::create([
            'name' => 'tecnico',
            'email' => 'tecnico@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $especialista->assignRole('tecnico');

        //solicitante
        $autoridad = User::create([
            'name' => 'usuario1',
            'email' => 'solicitante@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $autoridad->assignRole('solicitante');

        //esp2
        $esp2 = User::create([
            'name' => 'usuario2',
            'email' => 'usuario2@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $esp2->assignRole('tecnico');

        //esp3
        $esp3 = User::create([
            'name' => 'usuario3',
            'email' => 'usuario3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $esp3->assignRole('tecnico');
        //esp4
        $esp4 = User::create([
            'name' => 'usuario4',
            'email' => 'usuario4@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $esp4->assignRole('tecnico');
        //esp5
        $esp5 = User::create([
            'name' => 'usuario5',
            'email' => 'usuario5@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $esp5->assignRole('tecnico');
        //esp6
        $esp6 = User::create([
            'name' => 'usuario6',
            'email' => 'usuario6@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $esp6->assignRole('tecnico');
//Directores
        //dir. Miguel
        $dir2 = User::create([
            'name' => 'dir2',
            'email' => 'dir2@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $dir2->assignRole('ejecutivo');
         //dir. Wilhem
         $dir3 = User::create([
            'name' => 'dir3',
            'email' => 'dir3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $dir3->assignRole('operativo');

//Autoridades
        //aut2
        /*
        $aut2 = User::create([
            'name' => 'aut2',
            'email' => 'aut2@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut2->assignRole('solicitante');
         //aut3
         $aut3 = User::create([
            'name' => 'aut3',
            'email' => 'aut3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut3->assignRole('solicitante');
         //aut4
         $aut4 = User::create([
            'name' => 'aut4',
            'email' => 'aut4@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut4->assignRole('solicitante');
         //aut5
         $aut5 = User::create([
            'name' => 'aut5',
            'email' => 'aut5@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut5->assignRole('solicitante');
         //aut6
         $aut6 = User::create([
            'name' => 'aut6',
            'email' => 'aut6@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut6->assignRole('solicitante');
         //aut7
         $aut7 = User::create([
            'name' => 'aut7',
            'email' => 'aut7@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut7->assignRole('solicitante');
         //aut8
         $aut8 = User::create([
            'name' => 'aut8',
            'email' => 'aut8@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut8->assignRole('solicitante');
         //aut9
         $aut9= User::create([
            'name' => 'aut9',
            'email' => 'aut9@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut9->assignRole('solicitante');
         //aut10
         $aut10 = User::create([
            'name' => 'aut10',
            'email' => 'aut10@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut10->assignRole('solicitante');
        //aut11
        $aut11 = User::create([
            'name' => 'aut11',
            'email' => 'aut11@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut11->assignRole('solicitante');
        //aut12
        $aut12 = User::create([
            'name' => 'aut12',
            'email' => 'aut12@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut12->assignRole('solicitante');
        //aut13
        $aut13 = User::create([
            'name' => 'aut13',
            'email' => 'aut13@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $aut13->assignRole('solicitante');
        */

    }
}

