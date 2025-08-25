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
        Schema::create('identity_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('identity_details_user_id');
            $table->string('valid_id')->default(0);
            $table->string('id_number', 50)->default('');
            $table->string('occupation')->default(0);
            $table->integer('tin')->default(0)->nullable();
            $table->integer('icr')->default(0)->nullable();
            $table->string('monthly_income')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity_details');
    }
};
