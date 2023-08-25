<?php

namespace App\Console;

use App\Models\Acl;
use App\Models\Ast;
use App\Models\Homologacion;
use App\Models\Initram;
use App\Models\Leylimitacion;
use App\Models\Mensaje;
use App\Models\Resadmin;
use App\Models\Tecnico;
use App\Models\Tramite;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            /** Inicio-admisión 5 dias*/
            $tiempo_1 = now()->subDay(1);
            /** admisión-ist 30 dias*/
            $tiempo_2 = now()->subDay(28);
             /** ist-ley municipal de limitación 30 dias*/
            $tiempo_3 = now()->subDay(28);
             /** ley municipal-acl 5 dias*/
            $tiempo_4 = now()->subDay(3);
              /** acl-homologacion 18 dias*/
            $tiempo_5 = now()->subDay(16);

            /** Tramites fuera de plazo*/

            echo $tiempo_1;
        
            $initrams =  Initram::whereDate('fecha', $tiempo_1)->get();

            $resadmins =  Resadmin::where('tipo','admisión')
            ->whereTime('created_at', '=', $tiempo_2)->get();

            $ists =  Ast::whereTime('created_at', '=', $tiempo_3)->get();

            $leylimitaciones =   Leylimitacion::whereTime('created_at', '=', $tiempo_3)->get();

            $acls =  Acl::whereTime('created_at', '=', $tiempo_4)->get(); 

             if ($initrams) {
                foreach ($initrams as $initram) {
                    $tramite = Tramite::find($initram->tramite_id);
    
                    Mensaje::create([
                        'status' => 1,
                        'mensaje' => 2,
                        'tramite_id' => $tramite->id,
                        'user_id' => $tramite->tecnico->user->id
                    ]);
                }
             } 
             
             if ($resadmins) {
            
                foreach ($resadmins as $resadmin) {
                    $tramite = Tramite::find($resadmin->tramite_id);

                    $notificacion = Mensaje::create([
                        'status' => '1',
                        'mensaje' => '2',
                        'tramite_id' => $tramite->id,
                        'user_id' => $tramite->tecnico->user->id
                    ]);
                }
             } 

             if ($ists) {
                foreach ($ists as $ist) {
                    $tramite = Tramite::find($ist->tramite_id);

                    $notificacion = Mensaje::create([
                        'status' => '1',
                        'mensaje' => '2',
                        'tramite_id' => $tramite->id,
                        'user_id' => $tramite->tecnico->user->id
                    ]);
                }
             } 

             if ($leylimitaciones) {
                foreach ($leylimitaciones as $leylimitacion) {
                    $tramite = Tramite::find($leylimitacion->tramite_id);

                    $notificacion = Mensaje::create([
                        'status' => '1',
                        'mensaje' => '2',
                        'tramite_id' => $tramite->id,
                        'user_id' => $tramite->tecnico->user->id
                    ]);
                }
             } 

             if ($acls) {
                foreach ($acls as $acl) {
                    $tramite = Tramite::find($leylimitacion->tramite_id);

                    $notificacion = Mensaje::create([
                        'status' => '1',
                        'mensaje' => '2',
                        'tramite_id' => $tramite->id,
                        'user_id' => $tramite->tecnico->user->id
                    ]);
                }
             } 

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
