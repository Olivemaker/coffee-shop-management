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
        Schema::table('Salaries', function (Blueprint $table) {
            $table->foreign(['id_staff'], 'salaries_ibfk_1')->references(['id'])->on('Staff')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_operation'], 'salaries_ibfk_2')->references(['id'])->on('FinancialRecord')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Salaries', function (Blueprint $table) {
            $table->dropForeign('salaries_ibfk_1');
            $table->dropForeign('salaries_ibfk_2');
        });
    }
};
