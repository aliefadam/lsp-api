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
        Schema::create('susunan_penguruses', function (Blueprint $table) {
            $table->id();
            $table->string("direktur");
            $table->string("departemen_sertifikasi_manajer");
            $table->string("departemen_sertifikasi_anggota");
            $table->string("departemen_manajemen_mutu_manajer");
            $table->string("departemen_manajemen_mutu_anggota");
            $table->string("departemen_administrasi_manajer");
            $table->string("departemen_administrasi_anggota");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susunan_penguruses');
    }
};
