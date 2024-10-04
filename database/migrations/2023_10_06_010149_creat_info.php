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
       Schema::create('infomationCustomer',function (Blueprint $table) {
        $table->id();
        $table->string('fullname');
        $table->integer('numberphone')->nullable();
        $table->string('email');
        $table->string('adress');
        $table->date('birthday')->nullable();
        $table->boolean('sex');
        $table->integer('customerID');
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
