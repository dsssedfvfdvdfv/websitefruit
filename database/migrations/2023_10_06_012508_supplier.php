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
        Schema::create('Supplier',function(Blueprint $table){
            $table->id();
            $table->string('Company');
            $table->string('Owner');
            $table->date('ContactSigingDate')->nullable();
            $table->integer('numberphone')->nullable();
            $table->string('email');
            $table->string('adress');
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
