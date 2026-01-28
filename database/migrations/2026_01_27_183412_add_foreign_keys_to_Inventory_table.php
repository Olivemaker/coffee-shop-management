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
        Schema::table('Inventory', function (Blueprint $table) {
            $table->foreign(['id_item'], 'inventory_ibfk_1')->references(['id'])->on('Store')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Inventory', function (Blueprint $table) {
            $table->dropForeign('inventory_ibfk_1');
        });
    }
};
