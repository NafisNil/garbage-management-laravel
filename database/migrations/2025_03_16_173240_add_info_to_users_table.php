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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('full_name')->nullable();
            $table->string('city_corporation')->nullable();
            $table->string('thana')->nullable();
            $table->string('ward')->nullable();
            $table->string('road')->nullable();
            $table->string('house')->nullable();
            $table->string('flat')->nullable();
            $table->string('phone')->nullable();
            $table->string('otp')->nullable();
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
