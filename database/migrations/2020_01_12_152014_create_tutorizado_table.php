<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorizadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorizados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tutorado')->unsigned()->nullable();
            $table->bigInteger('tutor')->unsigned()->nullable();
            $table->boolean('verificado')->default(false)->nullable();
            $table->string('verificadoToken', 255)->nullable();
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
        Schema::dropIfExists('tutorizados');
    }
}
