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
        Schema::create('address_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('address_details_user_id');
            $table->string('address');
            $table->string('birth_place');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('block_number');
            $table->string('street');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_details');
    }
};
