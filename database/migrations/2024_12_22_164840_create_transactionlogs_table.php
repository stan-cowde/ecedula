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
        Schema::create('transactionlogs', function (Blueprint $table) {
            $table->integer('log_id', true);
            $table->integer('user_id')->nullable();
            $table->integer('application_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->timestamp('log_date')->nullable()->useCurrent();
            $table->text('log_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionlogs');
    }
};
