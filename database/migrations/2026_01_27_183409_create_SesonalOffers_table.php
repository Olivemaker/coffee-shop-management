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
        Schema::create('SesonalOffers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->text('description');
            $table->string('image_path');
            $table->enum('style', ['summer', 'autumn', 'winter', 'spring']);
            $table->boolean('published');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SesonalOffers');
    }
};
