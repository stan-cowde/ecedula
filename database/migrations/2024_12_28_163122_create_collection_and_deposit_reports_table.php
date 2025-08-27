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

        /**
         *
         *  Serial Number Receipts Table Storage
         *
         */

        Schema::create('serial_number_receipts', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('serial_number_to')->unique();
            $table->bigInteger('serial_number_from')->unique();
            $table->boolean('is_active')->default(1);
            $table->timestamps();

        });

        /**
         *
         *  Serial Number Receipts Table Storage
         *
         */

        Schema::create('collection_and_deposit_reports', function (Blueprint $table) {

            $table->id();
            $table->foreignId('serial_number_receipt_id')->constrained('serial_number_receipts')->cascadeOnDelete();
            $table->string('receipt_number');
            $table->string('payor');
            $table->string('particulars');
            $table->integer('amount');
            $table->timestamps();
            $table->date('is_active')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_and_deposit_reports');
        Schema::dropIfExists('serial_number_receipts');
    }
};
