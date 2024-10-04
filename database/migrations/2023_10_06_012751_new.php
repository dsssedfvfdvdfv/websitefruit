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
        Schema::create('News',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->integer('UserID');
            $table->integer('CategoryID');
            $table->string('content');
            $table->date('publiccationDate')->nullable();
            $table->string('image');
            $table->boolean('status');
            $table->integer('view');
            $table->boolean('hot');
            $table->string('alias');
            $table->string('keyword');
            $table->string('desciption');
            $table->string('updateby');
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
