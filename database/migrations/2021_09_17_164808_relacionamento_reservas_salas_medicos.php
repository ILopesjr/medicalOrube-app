<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionamentoReservasSalasMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserves', function (Blueprint $table) {
            $table->foreign('id_doctor')->references("id")
                ->on("doctors");
            $table->foreign('id_room')->references("id")
                ->on("rooms");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(["id_doctor"]);
            $table->dropForeign(["id_room"]);
        });
    }
}
