<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->integer('profesionales_id', false, true)->length(10);
            $table->foreign('profesionales_id')->references('id')->on('profesionales')->onDelete('cascade');
            $table->integer('tratamiento_id', false, true)->length(10);
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');
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
        Schema::dropIfExists('profesionales_tratamiento');
    }
}
