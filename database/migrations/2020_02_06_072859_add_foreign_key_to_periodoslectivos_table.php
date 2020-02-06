<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPeriodoslectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodoslectivos', function (Blueprint $table) {
            $table->foreign('anyoescolar_id')->references('id')->on('anyosescolares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periodoslectivos', function (Blueprint $table) {
            $table->dropForeign('periodoslectivos_anyoescolar_id_foreign');
        });
    }
}
