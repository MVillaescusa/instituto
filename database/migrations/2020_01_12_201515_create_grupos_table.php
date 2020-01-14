<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->integer('curso')->unsigned()->nullable();
            //$table->string('letra',1)->nullable();
            //$table->string('nombre',100)->nullable();
            //$table->integer('tutor')->unsigned()->nullable();
            //$table->integer('anyoescolar')->unsigned();
            //$table->integer('nivel');
            //$table->boolean('verificado')->default(false);
            //$table->integer('creador')->unsigned()->nullable();
            //$table->timestamps();

            //MARCOS
            $table->bigIncrements('id');
            $table->unsignedInteger('curso')->nullable();
            $table->string('letra',10)->nullable();
            $table->string('nombre',100)->nullable();
            $table->unsignedInteger('tutor')->nullable();
            $table->unsignedInteger('anyoescolar');
            $table->unsignedInteger('nivel');
            $table->unsignedTinyInteger('verificado')->nullable();
            $table->unsignedInteger('creador');
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
        Schema::dropIfExists('grupos');
    }
}
