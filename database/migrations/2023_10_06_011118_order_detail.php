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
       Schema::create('orderdetail',function(Blueprint $table){
        $table->id();
        $table->integer('ProductID');
        $table->string('productName');
        $table->integer('quantity');
        $table->float('price');
        $table->integer('orderID');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
