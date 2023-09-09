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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->integer('talong')->nullable();
            $table->integer('balatong')->nullable();
            $table->integer('okra')->nullable();
            $table->integer('upo')->nullable();
            $table->integer('sili')->nullable();
            $table->integer('ampalaya')->nullable();
            $table->integer('pechay')->nullable();
            $table->integer('pipino')->nullable();
            $table->integer('patola')->nullable();
            $table->integer('tomato')->nullable();
            $table->integer('kalabasa')->nullable();
            $table->integer('mango')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
