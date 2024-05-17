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
        Schema::create('moduls', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->foreignUuid('bimbel_id')->nullable()->references('id')->on('bimbels')->onDelete('cascade');
            $table->foreignUuid('guru_id')->nullable()->references('id')->on('gurus')->onDelete('cascade');
            $table->string('status')->default(1);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};
