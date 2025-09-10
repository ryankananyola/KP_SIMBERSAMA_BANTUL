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
        Schema::create('padukuhan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('kelurahan_id')->constrained('kelurahan')->onDelete('cascade');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padukuhan');
    }
};
