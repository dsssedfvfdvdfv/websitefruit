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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('CodeID');
            $table->date('OrderTime')->nullable();
            $table->float('total');
            $table->string('paymentmethod');
            $table->boolean('paymentstatus');
            $table->boolean('orderstatus');
            $table->float('shippingFee');
            $table->boolean('importan');
            $table->float('totalAll');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
