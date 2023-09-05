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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->integer('carabao')->nullable();
            $table->integer('cattle')->nullable();
            $table->integer('breeder')->nullable();
            $table->integer('fattener')->nullable();
            $table->integer('goat')->nullable();
            $table->integer('sheep')->nullable();
            $table->integer('broiler')->nullable();
            $table->integer('layer')->nullable();
            $table->integer('native')->nullable();
            $table->integer('muscovy')->nullable();
            $table->integer('mallard')->nullable();
            $table->integer('turkey')->nullable();
            $table->integer('geese')->nullable();
            $table->integer('quail')->nullable();
            $table->integer('dog')->nullable();
            $table->integer('horse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
