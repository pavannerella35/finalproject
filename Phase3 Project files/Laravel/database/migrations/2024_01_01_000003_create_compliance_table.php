<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceTable extends Migration
{
    public function up()
    {
        Schema::create('compliance', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('appliesTo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compliance');
    }
}
