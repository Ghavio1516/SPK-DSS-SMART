<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaWeightsTable extends Migration
{
    public function up()
    {
        Schema::create('criteria_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternative_id')->constrained()->onDelete('cascade');
            $table->foreignId('entry_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criteria_weights');
    }
}
