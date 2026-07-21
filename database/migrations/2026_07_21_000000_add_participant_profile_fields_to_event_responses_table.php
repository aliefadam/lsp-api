<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_responses', function (Blueprint $table) {
            $table->string('pekerjaan')->nullable()->after('jurusan');
            $table->string('pangkat_golongan')->nullable()->after('pekerjaan');
            $table->text('alamat_rumah')->nullable()->after('pangkat_golongan');
            $table->text('alamat_instansi')->nullable()->after('alamat_rumah');
            $table->text('tujuan_sertifikasi')->nullable()->after('alamat_instansi');
        });
    }

    public function down(): void
    {
        Schema::table('event_responses', function (Blueprint $table) {
            $table->dropColumn([
                'pekerjaan',
                'pangkat_golongan',
                'alamat_rumah',
                'alamat_instansi',
                'tujuan_sertifikasi',
            ]);
        });
    }
};
