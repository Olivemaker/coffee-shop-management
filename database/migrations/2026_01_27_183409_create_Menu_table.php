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
        Schema::create('Menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->index('id_category');
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->index('id_status');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Menu');
    }
};
