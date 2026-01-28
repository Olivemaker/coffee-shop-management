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
        Schema::create('FinancialRecord', function (Blueprint $table) {
            $table->integer('id', true);
            $table->decimal('amount', 10, 0);
            $table->enum('payment_method', ['карта', 'наличные']);
            $table->enum('type', ['выручка', 'поставка', 'ЗП', 'такси']);
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
        Schema::dropIfExists('FinancialRecord');
    }
};
