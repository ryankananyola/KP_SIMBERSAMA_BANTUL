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
        Schema::create('documment_sk', function (Blueprint $table) {
            $table->id();
            $table->string('sk');
            $table->string('no_sk');
            $table->string('diperlukan_oleh');
            $table->string('file_sk')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('kondisi_bangunan')->nullable();
            $table->string('dibangun_oleh')->nullable();
            $table->string('pihak_membangun')->nullable();
            $table->year('tahun_pembangunan')->nullable();
            $table->integer('luas')->nullable();
            $table->bigInteger('biaya_pembangunan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documment_sk');
    }
};
