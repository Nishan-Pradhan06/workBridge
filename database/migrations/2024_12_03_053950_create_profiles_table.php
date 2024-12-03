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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('profile_picture')->nullable();
            $table->string('location');
            $table->text('bio')->nullable();
            $table->string('skills')->nullable();
            $table->string('skill_level');
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->text('certification_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
