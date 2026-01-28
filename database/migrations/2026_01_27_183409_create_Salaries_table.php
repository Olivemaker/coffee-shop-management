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
        Schema::create('Salaries', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_staff')->index('id_staff');
            $table->integer('id_operation')->index('id_operation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Salaries');
    }
};
