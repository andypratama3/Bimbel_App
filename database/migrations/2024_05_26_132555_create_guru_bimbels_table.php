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
        Schema::create('guru_bimbels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->time('jam_les');
            $table->string('jadwal_hari');
            $table->foreignUuid('bimbel_id')->nullable()->references('id')->on('bimbels')->onDelete('cascade');
            $table->foreignUuid('guru_id')->nullable()->references('id')->on('gurus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_bimbels');
    }
};
