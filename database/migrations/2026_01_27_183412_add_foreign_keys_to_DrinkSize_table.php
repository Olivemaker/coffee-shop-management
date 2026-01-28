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
        Schema::table('DrinkSize', function (Blueprint $table) {
            $table->foreign(['menu_id'], 'drinksize_ibfk_1')->references(['id'])->on('Menu')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DrinkSize', function (Blueprint $table) {
            $table->dropForeign('drinksize_ibfk_1');
        });
    }
};
