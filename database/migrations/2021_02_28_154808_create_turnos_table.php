<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('anio', false, true)->length(10)->nullable();
            $table->integer('mes', false, true)->length(10)->nullable();
            $table->date('dia')->nullable();
            $table->integer('tratamiento', false, true)->length(10)->nullable();
            $table->integer('profesional', false, true)->length(10)->nullable();
            $table->string('estado',9);
            $table->time('hora');
            $table->integer('paciente', false, true)->length(10)->nullable();
            $table->string('llegada',5)->nullable();
            $table->string('atencion',10)->nullable();
            $table->string('tipo',9);
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
        Schema::dropIfExists('turnos');
    }
}
