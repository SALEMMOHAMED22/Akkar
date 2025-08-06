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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
             $table->string('site_name_ar');
            $table->string('site_name_en');
            $table->text('site_desc_ar');
            $table->text('site_desc_en');
            $table->string('site_address_ar');
            $table->string('site_address_en');
            $table->string('site_phone');
            $table->string('whatsapp_number')->nullable();
            $table->string('site_email');
            $table->string('email_support');
            $table->string('facebook_url',500)->nullable();
            $table->string('twitter_url',500)->nullable();
            $table->string('youtube_url',500)->nullable();
            $table->string('linkedin_url',500)->nullable();
            // $table->string('tweetter_url',500);
            $table->string('behance_url',500);
            $table->string('meta_description_ar' , 160);
            $table->string('meta_description_en' , 160);
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->

            $table->string('site_copyright_ar');
            $table->string('site_copyright_en');
            
            $table->text('working_hours_ar')->nullable();
            $table->text('working_hours_en')->nullable();


             $table->string('promotion_video_url',1000)->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
