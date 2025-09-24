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
        Schema::table('akun', function (Blueprint $table) {
            $table->string('link_maps')->nullable()->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('akun', function (Blueprint $table) {
            $table->dropColumn('link_maps');
        });
    }
};
