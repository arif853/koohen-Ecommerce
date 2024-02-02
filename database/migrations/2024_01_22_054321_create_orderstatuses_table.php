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
        Schema::create('orderstatuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->enum('status',['pending','confirmed','shipped','delivered','completed','returned','cancelled'])->default('pending');
            $table->dateTime('confirmed_date_time')->nullable()->default(null);
            $table->dateTime('shipped_date_time')->nullable()->default(null);
            $table->dateTime('delivered_date_time')->nullable()->default(null);
            $table->dateTime('completed_date_time')->nullable()->default(null);
            $table->dateTime('returned_date_time')->nullable()->default(null);
            $table->dateTime('cancelled_date_time')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderstatuses');
    }
};
