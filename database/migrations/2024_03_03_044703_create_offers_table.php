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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('offer_type_id')->unsigned();
            $table->string('offer_name');
            $table->double('offer_percent');
            $table->string('to_date')->nullable();
            $table->string('from_date')->nullable();
            $table->string('day')->nullable();
            $table->foreign('offer_type_id')->references('id')->on('offer_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
