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
            $table->renameColumn('end_time', 'minutes');
        });
        Schema::table('timelogs', function (Blueprint $table) {
            $table->integer('minutes')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timelogs', function (Blueprint $table) {
            $table->renameColumn('minutes', 'end_time');
            $table->time('end_time')->change();
        });
    }
};
