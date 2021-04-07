<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiainactivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diainactivos', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('diadesde')->nullable();
           
            $table->string('descripcion',150)->nullable();
            $table->integer('profesional', false, true)->length(10)->nullable();          
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
        Schema::dropIfExists('diainactivos');
    }
}
