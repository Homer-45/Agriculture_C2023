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
            $table->string('talong')->nullable();
            $table->string('balatong')->nullable();
            $table->string('okra')->nullable();
            $table->string('upo')->nullable();
            $table->string('sili')->nullable();
            $table->string('ampalaya')->nullable();
            $table->string('pechay')->nullable();
            $table->string('pipino')->nullable();
            $table->string('patola')->nullable();
            $table->string('tomato')->nullable();
            $table->string('kalabasa')->nullable();
            $table->string('mango')->nullable();

            $table->foreignId('farmers_id')->constrained();
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
