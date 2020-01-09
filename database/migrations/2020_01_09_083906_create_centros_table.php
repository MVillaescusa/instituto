<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo')->unsigned();
            $table->string('nombre', 100);
            $table->string('web', 255)->nullable();
            $table->point('situacion')->nullable();
            $table->bigInteger('coordinador')->unsigned()->nullable();
            $table->boolean('verificado')->default(false);
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
        Schema::dropIfExists('centros');
    }
}
