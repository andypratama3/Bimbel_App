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
        Schema::create('absensis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->foreignUuid('bimbel_id')->nullable()->references('id')->on('bimbels')->onDelete('cascade');
            $table->foreignUuid('guru_id')->nullable()->references('id')->on('gurus')->onDelete('cascade');
            $table->string('foto_absen');
            $table->string('sesi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
