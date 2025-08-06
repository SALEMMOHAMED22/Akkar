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
        Schema::create('subscription_addons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained('subscriptions')->cascadeOnDelete();
            $table->foreignId('addon_id')->constrained('addons')->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_addons');
    }
};
