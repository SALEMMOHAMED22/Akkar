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
        Schema::create('subscription_limits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subscription_id')->constrained('subscriptions')->cascadeOnDelete();

            $table->unsignedInteger('ads_limit')->nullable();        // null = غير محدود
            $table->unsignedInteger('images_limit')->nullable();   
            $table->boolean('video_enabled')->default(false);        
            $table->unsignedInteger('vr_tours_limit')->default(0);  
            $table->boolean('team_members')->default(false);       

            // === الاستهلاك الحالي (Usage) ===
            $table->unsignedInteger('ads_used')->default(0);
            $table->unsignedInteger('vr_tours_used')->default(0);

            $table->timestamps();

            
            $table->index(['ads_used']);
            $table->index(['vr_tours_used']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_limits');
    }
};
