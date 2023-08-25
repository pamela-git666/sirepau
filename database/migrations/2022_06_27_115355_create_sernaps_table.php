<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSernapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sernaps', function (Blueprint $table) {
            $table->id();
            $table->string('numruta');
            $table->date('fecha');
            $table->string('observacion');
            $table->string('archivo')->nullable();
            $table->unsignedBigInteger('ritu_id');

            $table->foreign('ritu_id')->references('id')->on('ritus')->onDelete('cascade');
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
        Schema::dropIfExists('sernaps');
    }
}
