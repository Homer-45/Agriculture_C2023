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
            $table->string('carabao')->nullable();
            $table->string('cattle')->nullable();
            $table->string('breeder')->nullable();
            $table->string('fattener')->nullable();
            $table->string('goat')->nullable();
            $table->string('sheep')->nullable();
            $table->string('broiler')->nullable();
            $table->string('layer')->nullable();
            $table->string('native')->nullable();
            $table->string('muscovy')->nullable();
            $table->string('mallard')->nullable();
            $table->string('turkey')->nullable();
            $table->string('geese')->nullable();
            $table->string('quail')->nullable();
            $table->string('dog')->nullable();
            $table->string('horse')->nullable();

            $table->foreignId('farmers_id')->constrained();
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
