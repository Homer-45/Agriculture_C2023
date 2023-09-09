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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->integer('reference_number')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex')->nullable();
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->nullable();
            $table->string('spouse')->nullable();
            $table->string('mothername')->nullable();
            $table->string('govID')->nullable();
            $table->integer('id_number')->nullable();
            $table->string('main_livelihood')->nullable();
            $table->string('farming_activity')->nullable();
            $table->string('farmworkers_work')->nullable();
            $table->string('fisherfolk')->nullable();
            $table->string('agri_youth')->nullable();
            $table->string('grossFarming')->nullable();
            $table->string('grossNonFarming')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
