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
        Schema::table('event_responses', function (Blueprint $table) {
            $table->string('proses_uji')->nullable()->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_responses', function (Blueprint $table) {
            $table->dropColumn('proses_uji');
        });
    }
};

