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
       Schema::create('Product',function(Blueprint $table){
            $table->id();
            $table->string('productname');
            $table->string('description');
            $table->float('price');
            $table->integer('stock_quantity');
            $table->integer('SupplierID');
            $table->boolean('hot');
            $table->string('image');
            $table->boolean('status');
            $table->integer('orderposition');
            $table->integer('CategoryID');
            $table->string('alias');
            $table->string('int');
            $table->string('keyword');
            $table->string('description_keyword');
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
