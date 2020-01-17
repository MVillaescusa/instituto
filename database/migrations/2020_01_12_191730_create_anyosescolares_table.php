<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnyosescolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anyosescolares', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->dateTime('fechainicio');
            //$table->dateTime('fechafinal');
            //$table->integer('centro')->unsigned();
            //$table->timestamps();

            //MARCOS
            $table->bigIncrements('id');
            $table->dateTime('fechainicio', 0);
            $table->dateTime('fechafinal', 0);
            $table->bigInteger('centro')->unsigned();
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
        Schema::dropIfExists('anyosescolares');
    }
}
