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
        Schema::table('Schedule', function (Blueprint $table) {
            $table->foreign(['id_staff'], 'schedule_ibfk_1')->references(['id'])->on('Staff')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_user'], 'schedule_ibfk_2')->references(['id'])->on('Users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Schedule', function (Blueprint $table) {
            $table->dropForeign('schedule_ibfk_1');
            $table->dropForeign('schedule_ibfk_2');
        });
    }
};
