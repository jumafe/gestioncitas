<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('apellido',50);
            $table->string('nombre',50);
            $table->string('telefono1',15);
            $table->string('telefono2',15);       
            $table->date('fnacimiento',2);
            $table->string('email',50);
            $table->integer('osocial', false, true)->length(10);
            $table->string('plan',50); 
            $table->string('nrosocial',25); 
            $table->string('domicilio',150); 
            $table->string('observa',300);
            $table->string('obsclinica',500);
            $table->integer('dni', false, true)->length(8);
            $table->string('celular',15);
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
        Schema::dropIfExists('pacientes');
    }
}
