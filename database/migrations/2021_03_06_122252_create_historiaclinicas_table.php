<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaclinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinicas', function (Blueprint $table) {
          
            $table->Increments('id');
            $table->date('dia')->nullable();
            $table->integer('paciente', false, true)->length(10)->nullable();
            $table->string('diagnostico',100)->nullable()->nullable();
            $table->integer('especialidad', false, true)->length(10)->nullable();
            $table->integer('profesional', false, true)->length(10)->nullable();
            $table->string('observacion',4000)->nullable();
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
        Schema::dropIfExists('historiaclinicas');
    }
}
