<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adminstaf', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('no_hp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->tinyInteger('role')->default(1); 
            // 1 = Petugas, 2 = Admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adminstaf');
    }
};
