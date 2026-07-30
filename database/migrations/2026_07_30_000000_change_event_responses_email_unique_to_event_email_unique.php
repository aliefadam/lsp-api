<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_responses', function (Blueprint $table) {
            $table->dropUnique('event_responses_email_unique');
            $table->unique(['event_id', 'email'], 'event_responses_event_id_email_unique');
        });
    }

    public function down(): void
    {
        Schema::table('event_responses', function (Blueprint $table) {
            $table->dropUnique('event_responses_event_id_email_unique');
            $table->unique('email', 'event_responses_email_unique');
        });
    }
};
