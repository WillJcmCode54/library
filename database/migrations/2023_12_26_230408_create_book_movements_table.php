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
        Schema::create('book_movements', function (Blueprint $table) {
            $table->id();
            $table->string('type_movement');
            $table->date('loan_date');
            $table->date('retun_date');
            $table->date('real_date');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_movements');
    }
};
