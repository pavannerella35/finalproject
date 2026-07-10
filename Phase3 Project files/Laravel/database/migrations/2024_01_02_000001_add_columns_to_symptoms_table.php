<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSymptomsTable extends Migration
{
    public function up()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            if (!Schema::hasColumn('symptoms', 'symptom1')) {
                $table->string('symptom1')->nullable();
            }
            if (!Schema::hasColumn('symptoms', 'symptom2')) {
                $table->string('symptom2')->nullable();
            }
            if (!Schema::hasColumn('symptoms', 'guidance')) {
                $table->text('guidance')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            $table->dropColumn(['symptom1', 'symptom2', 'guidance']);
        });
    }
}
