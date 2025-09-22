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
        Schema::create('event_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scheme_id");
            $table->foreignId("event_id");
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nik')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('kepesertaan')->nullable();
            $table->string('instansi_pengusul')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->string('scan_ijazah')->nullable();
            $table->string('surat_usulan_institusi')->nullable();
            $table->string('keanggotaan_iapa')->nullable();
            $table->string('no_anggota_iapa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_responses');
    }
};
