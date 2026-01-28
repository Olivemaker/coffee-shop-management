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
        Schema::create('Delivery', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_supplier')->index('id_supplier');
            $table->integer('id_item')->index('id_product');
            $table->decimal('quantity', 10, 0);
            $table->date('date');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Delivery');
    }
};
