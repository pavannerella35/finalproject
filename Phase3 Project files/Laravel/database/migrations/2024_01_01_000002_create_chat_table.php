<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fromId')->nullable();
            $table->unsignedBigInteger('toId')->nullable();
            $table->string('fromUser')->nullable();
            $table->string('toUser')->nullable();
            $table->text('message')->nullable();
            $table->string('messageDate')->nullable();
            $table->boolean('new')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
