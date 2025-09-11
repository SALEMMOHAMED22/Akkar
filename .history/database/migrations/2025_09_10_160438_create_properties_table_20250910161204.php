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
        Schema::create('properties', function (Blueprint $table) {
             $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

          
            $table->enum('category', ['sale','rent','share','land','other])->nullable();
            $table->enum('unit_type', ['apartment','villa','duplex','office','shop','warehouse','land','other'])->nullable();

            $table->string('title')->nullable();
            $table->unsignedInteger('rooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->unsignedInteger('floor')->nullable();
            $table->unsignedInteger('area_sqm')->nullable();

            $table->enum('finishing_status', ['none','semi_finished','finished','luxury'])->nullable();
            $table->enum('furniture_status', ['unfurnished','semi_furnished','furnished'])->nullable();
            $table->enum('build_status', ['under_construction','ready'])->nullable();

            $table->enum('payment_method', ['cash','installments','rent'])->nullable();
            $table->decimal('price', 14, 2)->nullable();
            $table->decimal('deposit_amount', 14, 2)->nullable();

            $table->string('address_line')->nullable();
            $table->text('address_details')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // روابط اختيارية
            $table->string('ar_link')->nullable();
            $table->string('vr_link')->nullable();

            $table->enum('status', ['draft','pending','published','archived'])->default('draft');

            $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
