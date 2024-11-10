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
        Schema::create('milk_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->dateTime('date_time');
            $table->decimal('quantity', 5, 2);
            $table->decimal('fat_percentage', 3, 2);
            $table->decimal('price_per_liter', 5, 2);
            $table->decimal('total_payment', 7, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milk_deliveries');
    }
};
