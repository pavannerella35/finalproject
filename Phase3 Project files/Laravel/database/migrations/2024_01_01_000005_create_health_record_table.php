<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthRecordTable extends Migration
{
    public function up()
    {
        Schema::create('healthRecord', function (Blueprint $table) {
            $table->id();
            $table->date('fromDate')->nullable();
            $table->date('toDate')->nullable();
            $table->string('patient')->nullable();
            $table->unsignedBigInteger('patientID')->nullable();
            $table->string('doctor')->nullable();
            $table->unsignedBigInteger('doctorID')->nullable();
            $table->text('reason')->nullable();
            $table->string('medicine')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('healthRecord');
    }
}
