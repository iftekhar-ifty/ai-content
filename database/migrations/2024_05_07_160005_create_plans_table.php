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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('duration');
            $table->integer('word_limit');
            $table->integer('price');
            $table->integer('y_price');
            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->integer('trial_days')->nullable();
            $table->string('currency')->nullable();
            $table->string('interval')->nullable();
            $table->string('description')->nullable();
            $table->longText('features')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
