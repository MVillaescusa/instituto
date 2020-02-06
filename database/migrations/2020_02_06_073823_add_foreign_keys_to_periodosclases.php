<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPeriodosclases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodosclases', function (Blueprint $table) {
            $table->foreign('periodo_id')->references('id')->on('periodoslectivos')->onDelete('cascade');
            $table->foreign('materiaimpartida_id')->references('id')->on('materiasimpartidas')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periodosclases', function (Blueprint $table) {
            $table->dropForeign('periodosclases_periodo_id_foreign');
            $table->dropForeign('periodosclases_materiaimpartida_id_foreign');
            $table->dropForeign('periodosclases_aula_id_foreign');
        });
    }
}
