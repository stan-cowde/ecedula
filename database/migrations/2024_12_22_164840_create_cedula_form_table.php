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
        Schema::create('cedula_form', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cedula_number', 50)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('fullName')->nullable();
            $table->string('barangay');
            $table->string('address');
            $table->string('tin')->nullable();
            $table->decimal('height', 5);
            $table->decimal('weight', 5);
            $table->string('icr_no')->nullable();
            $table->string('place_of_birth');
            $table->string('profession')->nullable();
            $table->string('gender');
            $table->string('civil_status');
            $table->tinyInteger('isEmployedOrBusinessOwner')->default(0);
            $table->decimal('annual_income', 10)->nullable();
            $table->decimal('fee', 10)->nullable();
            $table->string('citizenship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cedula_form');
    }
};
