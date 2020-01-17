<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToAnyosescolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anyosescolares', function (Blueprint $table) {
            $table->foreign('centro')->references('id')->on('centros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anyosescolares', function (Blueprint $table) {
            $table->dropForeign('anyosescolares_centro_foreign');
        });
    }
}
