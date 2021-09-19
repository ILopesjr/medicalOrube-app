<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("id_patient");
            $table->unsignedInteger("id_doctor");
            $table->time("initial_time_attendance")->nullable();
            $table->time("end_time_attendance")->nullable();
            $table->text("complaint_disease")->nullable();
            $table->text("proceedings")->nullable();
            $table->decimal("height", 10, 2)->nullable();
            $table->decimal("weight", 10, 2)->nullable();
            $table->integer("age")->nullable();
            $table->char("gender", 1);
            $table->date("service_date");
            $table->boolean('visible')->nullable()->default(1);
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
        Schema::dropIfExists('appointments');
    }
}
