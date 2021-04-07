<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('apellido',50);
            $table->string('nombre',50);
            $table->string('telefono1',50);
            $table->string('telefono2',50);
            $table->string('email',50);
            $table->string('doctor',2);
            $table->integer('especialidad', false, true)->length(10);
            $table->time('intervalos');
            $table->integer('sobreturno', false, true)->length(10);
            $table->time('hssobreturno');
            $table->integer('sobreturnoe', false, true)->length(10);
            $table->time('hssobreturnoe');
            $table->integer('practicas', false, true)->length(10);
            $table->time('hspracticas');
            $table->string('estado',8);
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
        Schema::dropIfExists('profesionales');
    }
}
