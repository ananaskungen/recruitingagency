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
        Schema::create('case_managers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email');
            $table->string('phone_number');
            $table->boolean('past_experience');
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('location');
            $table->string('video')->nullable();
            $table->boolean('is_remote');
            $table->string('website');
            $table->text('additional_info')->nullable();
            $table->boolean('are_you_currently_working');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_managers');
    }
};