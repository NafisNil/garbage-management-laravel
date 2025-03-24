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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('city_corporation')->nullable();
            $table->string('ward')->nullable();
            $table->string('thana')->nullable();
            $table->string('road')->nullable();
            $table->string('house')->nullable();
            $table->string('flat')->nullable();
            $table->text('others')->nullable();
            $table->string('logo')->nullable();
            $table->string('user_id')->nullable();
            $table->string('waste_type')->nullable();
            $table->string('status')->nullable()->comment('0=চলমান, 1=ভেন্ডোর নিযুক্ত হয়েছে, 2=সমাধান করা হয়েছে');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
