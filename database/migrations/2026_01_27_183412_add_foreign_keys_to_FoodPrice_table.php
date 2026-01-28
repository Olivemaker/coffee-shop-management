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
        Schema::table('FoodPrice', function (Blueprint $table) {
            $table->foreign(['category_id'], 'foodprice_ibfk_1')->references(['id'])->on('Category')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('FoodPrice', function (Blueprint $table) {
            $table->dropForeign('foodprice_ibfk_1');
        });
    }
};
