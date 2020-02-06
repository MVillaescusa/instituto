<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodolectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodoslectivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('dia', ['L', 'M', 'X', 'J', 'V']);
            $table->time('hora_inicio', 0);
            $table->time('hora_fin', 0);
            $table->integer('anyoescolar_id');
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
        Schema::dropIfExists('periodoslectivos');
    }
}
