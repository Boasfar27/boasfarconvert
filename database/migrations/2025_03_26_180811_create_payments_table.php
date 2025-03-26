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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('payment_id')->nullable();
            $table->string('description');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->string('type'); // premium_upgrade, limit_increase
            $table->string('payment_proof')->nullable(); // File path for payment proof upload
            $table->text('notes')->nullable(); // Admin notes on the payment
            $table->json('additional_data')->nullable();
            $table->foreignId('processed_by')->nullable()->constrained('users');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
