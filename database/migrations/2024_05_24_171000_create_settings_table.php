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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('sdsd');
            $table->string('fav_icon')->default('sdsd');
            $table->string('f_logo')->default('sdsd');
            $table->string('stripe_p')->nullable();
            $table->string('stripe_s')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->default('demo@gmail.com');
            $table->string('phone')->default(3487534875);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
