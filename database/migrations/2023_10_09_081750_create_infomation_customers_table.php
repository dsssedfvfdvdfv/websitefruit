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
        Schema::create('infomation_customers', function (Blueprint $table) {
            $table->id();
            $table->string('adress');
            $table->string('name');
            $table->integer('numberphone');
            $table->string('email');
            $table->date('birthday');
            $table->boolean('sex');
            $table->boolean('sex');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infomation_customers');
    }
};
