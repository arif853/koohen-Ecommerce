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
        Schema::create('feature_products_with_pivot', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feature_products_id')->unsigned();
            $table->bigInteger('products_id')->unsigned();
            $table->foreign('feature_products_id')->references('id')->on('feature_products')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_products_with_pivot');
    }
};
