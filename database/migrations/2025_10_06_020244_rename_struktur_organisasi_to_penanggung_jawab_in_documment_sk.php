<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->renameColumn('struktur_organisasi', 'penanggung_jawab');
        });
    }

    /**
     * Batalkan migrasi (rollback).
     */
    public function down(): void
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->renameColumn('penanggung_jawab', 'struktur_organisasi');
        });
    }
};
