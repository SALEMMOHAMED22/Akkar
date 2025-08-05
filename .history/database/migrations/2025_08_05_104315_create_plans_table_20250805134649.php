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
            $table->foreignId('plan_category_id')->constrained('plan_categories')->cascadeOnDelete();
            $table->string('name_ar');
            $table->string('name_en');
            $table->decimal('price_per_month' , 8 , 2)->nullable()->default(0);
            $table->decimal('price_per_year' , 8 , 2)->nullable()->default(0);
            $table->text('desc_ar')->nullable();
            $table->text('desc_en')->nullable();
            $table->boolean('status')->default(1);
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
