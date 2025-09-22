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
        Schema::create('asesors', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("nik")->nullable();
            $table->string("domisili")->nullable();
            $table->string("universitas")->nullable();
            $table->string("no_sertifikat")->nullable();
            $table->string("no_registrasi")->nullable();
            $table->date("tanggal_sertifikat_asesor")->nullable();
            $table->string("nama_sertifikat_kompetensi_teknis")->nullable();
            $table->date("tanggal_sertifikat_kompetensi_teknis")->nullable();
            $table->string("kualifikasi")->nullable();
            $table->integer("jumlah_uji")->nullable();
            $table->string("nama_bank")->nullable();
            $table->double("no_rekening")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesors');
    }
};
