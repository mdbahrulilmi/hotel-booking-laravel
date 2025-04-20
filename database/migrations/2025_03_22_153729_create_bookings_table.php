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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('payment_method', ['credit_card', 'e-wallet', 'bank', 'qris']);
            $table->enum('status', ['pending', 'confirmed', 'canceled']);
            
            $table->enum('credit_card_type', ['visa', 'mastercard', 'american_express', 'discover'])->nullable(); 
            $table->enum('bank_type', ['bri', 'bni', 'mandiri', 'bca'])->nullable();
            $table->enum('ewallet_type', ['dana', 'ovo', 'gopay'])->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
