<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nomor_wa');
            $table->string('jenis_fasilitas')->nullable();
            $table->string('nama_bank_sampah')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('kapanewon_id');
            $table->unsignedBigInteger('kelurahan_id');
            $table->unsignedBigInteger('padukuhan_id');
            $table->string('username')->unique();
            $table->tinyInteger('role')->default(0);
            $table->timestamps();
            $table->foreign('kapanewon_id')->references('id')->on('kapanewon');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan');
            $table->foreign('padukuhan_id')->references('id')->on('padukuhan');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
