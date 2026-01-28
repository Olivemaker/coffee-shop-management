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
        Schema::table('DrinksImages', function (Blueprint $table) {
            $table->foreign(['menu_id'], 'drinksimages_ibfk_1')->references(['id'])->on('Menu')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DrinksImages', function (Blueprint $table) {
            $table->dropForeign('drinksimages_ibfk_1');
        });
    }
};
