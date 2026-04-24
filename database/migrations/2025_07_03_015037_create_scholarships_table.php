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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('amount')->nullable();

            $table->timestamps();
            $table->foreign('university_id')->references('id')->on('university_courses')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('university_courses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
