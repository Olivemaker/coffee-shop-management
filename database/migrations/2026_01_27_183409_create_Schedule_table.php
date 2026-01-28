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
        Schema::create('Schedule', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_staff')->index('id_staff');
            $table->date('date');
            $table->enum('shift', ['full-day', 'first-half', 'second-half'])->nullable()->index('shift');
            $table->integer('id_user')->nullable()->index('id_user');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Schedule');
    }
};
