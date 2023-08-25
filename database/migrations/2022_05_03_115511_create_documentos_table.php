<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('informe');
            $table->string('archivo')->nullable();
       //   $table->string('adm');
       //   $table->string('itu')->nullable();
       //   $table->string('iac')->nullable();
       //   $table->string('ist')->nullable();
       //   $table->string('ritu')->nullable();
       //   $table->string('il_ic')->nullable();
            $table->unsignedBigInteger('tramite_id');
      
            $table->foreign('tramite_id')->references('id')->on('tramites');
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
        Schema::dropIfExists('documentos');
    }
}
