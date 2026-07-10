<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->string('patient')->nullable();
            $table->unsignedBigInteger('patientID')->nullable();
            $table->string('doctor')->nullable();
            $table->unsignedBigInteger('doctorID')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
