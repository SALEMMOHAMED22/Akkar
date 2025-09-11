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
            $table->string('name_ar');
            $table->string('name_en'); 
            $table->decimal('price', 10, 2)->default(0); 
            $table->unsignedInteger('ads_limit')->nullable();
            $table->boolean('unlimited_images')->default(false);
            $table->boolean('video')->default(false);
            $table->unsignedInteger('vr_tours')->default(0);
            $table->enum('search_priority', ['normal', 'highlighted', 'top'])->default('normal');
            $table->enum('reports', ['none', 'basic', 'advanced'])->default('none');
            $table->unsignedInteger('team_members')->default(0);
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
