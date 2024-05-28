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
        Schema::create('guru_kriteria', function (Blueprint $table) {
            $table->foreignUuid('kriteria_id')->nullable()->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreignUuid('guru_id')->nullable()->references('id')->on('gurus')->onDelete('cascade');
            $table->primary(['kriteria_id', 'guru_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('guru_kriteria');
    }
};
