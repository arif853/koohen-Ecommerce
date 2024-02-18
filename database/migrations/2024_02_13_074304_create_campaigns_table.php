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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
=======
            $table->string('camp_name');
            $table->string('image');
            $table->string('camp_offer')->default(0);
            $table->string('slug');
            $table->enum('status',['Draft','Published'])->default('Draft');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
