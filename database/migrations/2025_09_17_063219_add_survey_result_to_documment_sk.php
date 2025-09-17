<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->enum('survey_result', ['Layak', 'Perlu Perbaikan'])->nullable()->after('survey_date');
        });
    }

    public function down(): void
    {
        Schema::table('documment_sk', function (Blueprint $table) {
            $table->dropColumn('survey_result');
        });
    }
};
