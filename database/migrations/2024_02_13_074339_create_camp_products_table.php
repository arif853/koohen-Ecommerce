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
        Schema::create('camp_products', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
=======
            $table->bigInteger('campaign_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->decimal('regular_price');
            $table->decimal('camp_price')->nullable();
            $table->decimal('camp_qty')->nullable();
            $table->decimal('start_date')->nullable();
            $table->decimal('end_date')->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_products');
    }
};
