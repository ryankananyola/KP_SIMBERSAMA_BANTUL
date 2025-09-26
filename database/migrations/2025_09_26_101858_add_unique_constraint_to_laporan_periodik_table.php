<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('laporan_periodik', function (Blueprint $table) {
            $table->unique(['user_id', 'periode', 'tahun']);
        });
    }

    public function down()
    {
        Schema::table('laporan_periodik', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'periode', 'tahun']);
        });
    }

};
