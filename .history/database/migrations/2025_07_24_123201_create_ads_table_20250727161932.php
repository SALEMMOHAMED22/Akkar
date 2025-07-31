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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ad_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ad_sub_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ad_sub_sub_category_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('ad_name_ar');
            $table->string('ad_name_en');
            $table->integer('price')->nullable();
            $table->text('small_desc_ar')->nullable();
            $table->text('small_desc_en')->nullable();
            $table->longText('desc_ar')->nullable();
            $table->longText('desc_en')->nullable();
            $table->string('location')->nullable();
            $table->string('AR_VR')->nullable();
            $table->boolean('status')->default(1);
            $table->date('expire_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
