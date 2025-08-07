<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('timelogs', function (Blueprint $table) {
            $table->renameColumn('start_time', 'hours');
        });
        Schema::table('timelogs', function (Blueprint $table) {
            $table->integer('hours')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timelogs', function (Blueprint $table) {
            $table->renameColumn('hours', 'start_time');
            $table->time('start_time')->change();
        });
    }
};
