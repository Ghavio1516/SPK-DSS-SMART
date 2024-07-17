<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEntriesTableAddCriteria extends Migration
{
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->string('criteria1_name')->nullable();
            $table->float('criteria1_weight')->nullable();
            $table->string('criteria2_name')->nullable();
            $table->float('criteria2_weight')->nullable();
            $table->string('criteria3_name')->nullable();
            $table->float('criteria3_weight')->nullable();
            // Add more criteria if necessary
        });
    }

    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->dropColumn(['criteria1_name', 'criteria1_weight', 'criteria2_name', 'criteria2_weight', 'criteria3_name', 'criteria3_weight']);
            // Drop more criteria if necessary
        });
    }
}
