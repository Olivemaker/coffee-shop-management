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
        Schema::create('DrinkSize', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('menu_id')->index('id_drink');
            $table->enum('size', ['S', 'M', 'L']);
            $table->decimal('price', 10, 0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DrinkSize');
    }
};
