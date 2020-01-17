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
            $table->bigIncrements('id');
            $table->unsignedInteger('curso')->nullable();
            $table->string('letra',10)->nullable();
            $table->string('nombre',100)->nullable();
            $table->unsignedInteger('tutor')->nullable();
            $table->bigInteger('anyoescolar')->unsigned();
            $table->bigInteger('nivel')->unsigned();
            $table->unsignedTinyInteger('verificado')->nullable();
            $table->bigInteger('creador')->unsigned();
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
