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
        Schema::create('user_identifies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('personal_photo')->nullable();

            $table->string('national_id_front')->nullable();
            $table->string('national_id_back')->nullable();

            $table->string('engineer_card_front')->nullable();
            $table->string('engineer_card_back')->nullable();

            $table->

            // user data 
            $table->string('personal_image')->nullable();
            $table->

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_identifies');
    }
};
