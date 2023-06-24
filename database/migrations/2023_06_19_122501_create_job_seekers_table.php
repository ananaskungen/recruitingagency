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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('location');
            $table->string('is_remote');
            $table->string('is_working');
            $table->string('field');
            $table->string('job_type');
            $table->string('website')->nullable();
            $table->text('additional_info')->nullable(); 
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
