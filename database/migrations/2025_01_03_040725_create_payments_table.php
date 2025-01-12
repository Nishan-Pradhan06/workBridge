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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // References users table
            $table->foreignId('job_id')->constrained('job_posts')->onDelete('cascade'); // References job_posts table
            $table->float('amount', 8, 2)->default(0); // Amount with two decimal places
            $table->string('status')->default('pending'); // Payment status (e.g., pending, completed)
            $table->string('purchase_order_id')->nullable(); // Purchase order ID
            $table->string('transaction_id')->nullable(); // Transaction ID
            $table->string('pidx')->nullable(); // Optional payment index field
            $table->string('payment_url')->nullable(); // Payment URL
            $table->timestamps(); // created_at and updated_at
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
