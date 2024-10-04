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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('configvalue');
            $table->string('description');
            $table->string('URLweb');
            $table->integer('numberphone');
            $table->string('email');
            $table->string('adress');
            $table->string('logo');
            $table->string('keyword');
            $table->string('description_keyword');
            $table->string('copyright');
            $table->string('contact');
            $table->string('config_copyright_value');
            $table->string('map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
