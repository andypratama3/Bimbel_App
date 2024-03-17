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
        Schema::create('bimbels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_anak');
            $table->enum('jk', ['Laki-Laki', 'Perempuan']);
            $table->string('usia');
            $table->string('kelas_berjalan');
            $table->string('jenjang_sekolah');
            $table->string('bimbingan_konsultasi');
            $table->enum('program_les', ['Regular','Islami']);
            $table->string('jumlah_pertemuan');
            $table->string('jadwal_hari');
            $table->string('jam_les');
            $table->string('tanggal_mulai');
            $table->string('pelajaran_tertentu');
            $table->string('mengaji');
            $table->longText('alamat');
            $table->string('asal_sekolah');
            $table->string('agama');
            $table->string('orang_tua');
            $table->string('no_telp');
            $table->string('catatan_anak_didik')->nullable();
            $table->string('catatan_guru_les')->nullable();
            $table->string('informasi_bimbel')->nullable();
            $table->string('status')->default('0');
            $table->string('image_pembayaran')->nullable();
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbels');
    }
};
