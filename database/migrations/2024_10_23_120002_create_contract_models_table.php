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
        // Schema::create('contract_models', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('job_id')->references('id')->on('job_posts');
        //     $table->foreignId('user_id')->references('id')->on('users');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_models');
    }
};
