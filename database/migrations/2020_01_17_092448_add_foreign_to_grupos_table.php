<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign('anyoescolar')->references('id')->on('anyosescolares')->onDelete('cascade');
            $table->foreign('nivel')->references('id')->on('niveles')->onDelete('cascade');
            $table->foreign('creador')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('grupos_anyoescolar_foreign');
            $table->dropForeign('grupos_nivel_foreign');
            $table->dropForeign('grupos_creador_foreign');
        });
    }
}
