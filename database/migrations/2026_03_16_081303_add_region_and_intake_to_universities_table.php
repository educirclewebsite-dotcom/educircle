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
        Schema::table('universities', function (Blueprint $table) {
            $table->string('region_type')->nullable()->after('rank'); // Regional, Non-Regional
            $table->json('intakes')->nullable()->after('region_type'); // ["Feb", "July"]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn(['region_type', 'intakes']);
        });
    }
};
