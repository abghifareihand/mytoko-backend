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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->string('trx_number');
            $table->enum('status', ['pending', 'paid', 'on_delivery', 'delivered', 'expired', 'cancelled']);
            $table->string('payment_method')->default('bank_transfer');
            $table->integer('total_price');
            $table->integer('shipping_cost');
            $table->integer('grand_total');

            // payment virtual account
            $table->string('payment_va_name')->nullable();
            $table->string('payment_va_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
