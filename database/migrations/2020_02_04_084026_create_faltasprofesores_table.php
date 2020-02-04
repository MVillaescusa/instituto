<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasprofesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltasprofesores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profesor_falta');
            $table->bigInteger('profesor_guardia')->nullable();
            $table->bigInteger('periodoclase_id');
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
        Schema::dropIfExists('faltasprofesores');
    }
}
