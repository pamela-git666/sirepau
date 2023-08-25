<?php

use App\Models\Tramite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('municipio_id');
            $table->string('centro_poblado');
            $table->string('no_inf');//numero de informe
           //$table->string('obs')->nullable();
           //$table->string('s_obs')->nullable();
            $table->string('situacion')->nullable();
          //$table->string('informe')->nullable();
          //$table->string('solicitud')->nullable();
            $table->enum('fase', [Tramite::PRE,Tramite::INI, Tramite::ANA, Tramite::EMI])->default(Tramite::PRE);
            $table->enum('status',[1,2,3])->default(1);//
            $table->unsignedBigInteger('tecnico_id');

            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}
