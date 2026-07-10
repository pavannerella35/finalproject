<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityTable extends Migration
{
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->id();
            $table->string('ward')->nullable();
            $table->string('roomDesc')->nullable();
            $table->string('roomNumber')->nullable();
            $table->integer('capacity')->nullable();
            $table->decimal('charges', 10, 2)->nullable();
            $table->boolean('available')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facility');
    }
}
