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
            $table->string('status_survey')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->dropColumn('status_survey');
        });
    }

};
