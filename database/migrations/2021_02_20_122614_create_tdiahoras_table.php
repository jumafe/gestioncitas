<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdiahorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdiahoras', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('profesional', false, true)->length(10);
            $table->integer('dia', false, true)->length(10);
            $table->time('horainicio');
            $table->time('horafin');
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
        Schema::dropIfExists('tdiahoras');
    }
}
