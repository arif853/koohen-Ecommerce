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
            $table->string('primary_mobile_no')->nullable();
            $table->string('secondary_mobile_no')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twiter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('email')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_short_details')->nullable();
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
