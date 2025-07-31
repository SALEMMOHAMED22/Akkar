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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type' , ['individual' , 'company']);

            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');

            $table->longText('bio')->nullable();
            $table->string('image')->nullable();

            // individual data
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->foreignId('job_title_id')->nullable()->constrained('')->cascadeOnDelete();
            $table->string('national_id')->nullable();
            $table->string('tax_number')->nullable();

            // company data
            $table->string('company_name')->nullable();
            $table->string('username')->nullable(); // اسم مستخدم الحساب
            $table->string('company_type_id')->nullable(); // نوع الشركة

            $table->string('email_notification')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
