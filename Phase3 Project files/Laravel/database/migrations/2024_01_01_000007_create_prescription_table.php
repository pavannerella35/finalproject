<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->id();
            $table->string('doctor')->nullable();
            $table->unsignedBigInteger('doctorID')->nullable();
            $table->string('patient')->nullable();
            $table->unsignedBigInteger('patientID')->nullable();
            $table->date('date')->nullable();
            $table->date('tillDate')->nullable();
            $table->unsignedBigInteger('medicationID')->nullable();
            $table->string('medicine')->nullable();
            $table->boolean('Morning')->default(false);
            $table->boolean('afternoon')->default(false);
            $table->boolean('night')->default(false);
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescription');
    }
}
