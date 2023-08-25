<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfbasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infbases', function (Blueprint $table) {
            $table->id();
            $table->string('numruta');
            $table->date('fecha');
            $table->string('tipo');
            $table->string('archivo');
            $table->string('numcite')->nullable();
            $table->unsignedBigInteger('tramite_id');

            $table->foreign('tramite_id')->references('id')->on('tramites')->onDelete('cascade');
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
        Schema::dropIfExists('infbases');
    }
}
