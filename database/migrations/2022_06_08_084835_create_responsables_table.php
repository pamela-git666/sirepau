<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
           //$table->string('extension',4);
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('cargo');
            $table->integer('celular');
            $table->string('designacion');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tramite_id');
          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('responsables');
    }
}
