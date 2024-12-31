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
        Schema::create('job_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->references('id')->on('job_posts');
            // $table->integer('user_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->date('project_duration');
            $table->string('cover_letter');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_proposals');
    }
};
