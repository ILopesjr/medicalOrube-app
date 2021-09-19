<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionamentoConsultasPacientesMedicosReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('id_doctor')->references("id")
                ->on("doctors");
            $table->foreign('id_patient')->references("id")
                ->on("patients")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['id_doctor']);
            $table->dropForeign(["id_patient"]);
        });
    }
}
