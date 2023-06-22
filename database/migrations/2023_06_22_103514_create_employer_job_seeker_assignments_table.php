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
        Schema::create('employer_job_seeker_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('job_seeker_id');
            // Additional columns as needed

            // Foreign key constraints
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_job_seeker_assignments');
    }
};
