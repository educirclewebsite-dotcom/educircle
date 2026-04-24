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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->string('last_name');
            $table->string('mobile_no');
            $table->string('whatsapp_no')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('city');
            $table->string('country');
            $table->string('course_type');
            $table->string('graduation_level');
            $table->string('course_preference');

            $table->decimal('offer_price', 10, 2)->default(0);
            $table->decimal('final_price', 10, 2)->nullable();

            $table->enum('status', ['new', 'admission', 'in process'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('students');
    }
};
