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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();

            $table->decimal('total_price', 10, 2);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->enum('status' , ['active' , 'expired' , 'pending'])->default('pending'); 
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
