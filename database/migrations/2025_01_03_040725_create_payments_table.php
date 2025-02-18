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

            // Foreign keys
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('freelancer_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('job_id')->nullable()->constrained('job_posts')->onDelete('cascade');
            $table->foreignId('proposal_id')->nullable()->constrained('job_proposals')->onDelete('cascade');

            // Payment details
            $table->float('amount', 8, 2)->default(0);
            $table->string('status')->default('pending');
            $table->string('purchase_order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('pidx')->nullable();
            $table->string('payment_url')->nullable();
            $table->string('release_amt')->nullable();
            $table->enum('release_status', ['pending', 'completed'])->default('pending');

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
