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
        Schema::create('laporan_periodik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->enum('periode', ['1', '2']);
            $table->year('tahun');
            $table->decimal('organik_rumah_tangga', 10, 2)->default(0);
            $table->decimal('organik_pasar', 10, 2)->default(0);
            $table->decimal('organik_kantor', 10, 2)->default(0);
            $table->decimal('anorganik_rumah_tangga', 10, 2)->default(0);
            $table->decimal('anorganik_pasar', 10, 2)->default(0);
            $table->decimal('anorganik_kantor', 10, 2)->default(0);
            $table->decimal('b3_rumah_tangga', 10, 2)->default(0);
            $table->decimal('b3_pasar', 10, 2)->default(0);
            $table->decimal('b3_kantor', 10, 2)->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_periodik');
    }
};
