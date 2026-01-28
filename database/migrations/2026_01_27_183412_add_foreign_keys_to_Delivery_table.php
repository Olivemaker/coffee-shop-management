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
        Schema::table('Delivery', function (Blueprint $table) {
            $table->foreign(['id_item'], 'delivery_ibfk_1')->references(['id'])->on('Store')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_supplier'], 'delivery_ibfk_2')->references(['id'])->on('Suppliers')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Delivery', function (Blueprint $table) {
            $table->dropForeign('delivery_ibfk_1');
            $table->dropForeign('delivery_ibfk_2');
        });
    }
};
