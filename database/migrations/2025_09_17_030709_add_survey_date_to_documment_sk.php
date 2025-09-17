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
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->timestamp('survey_date')->nullable();
            $table->text('catatan_petugas')->nullable()->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            //
        });
    }
};
