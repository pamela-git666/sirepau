<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRitusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ritus', function (Blueprint $table) {
            $table->id();
            $table->string('numruta');
            $table->string('nombre');
            $table->date('fecha');  
            $table->string('observacion');
            $table->string('archivo');
            $table->unsignedBigInteger('tramite_id');
      
            $table->foreign('tramite_id')->references('id')->on('tramites');
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
        Schema::dropIfExists('ritus');
    }
}
