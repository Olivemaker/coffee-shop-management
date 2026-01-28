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
        Schema::create('Store', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->decimal('current_quantity', 10, 0);
            $table->enum('unit_measure', ['кг', 'шт']);
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Store');
    }
};
