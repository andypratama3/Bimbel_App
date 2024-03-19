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
        Schema::create('gurus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('cv')->nullable();
            $table->string('whatsapp');
            $table->string('status')->default('0');
            $table->string('foto')->nullable();

            //jenjang tk,sd,smp, smk,
            $table->string('jenjang')->nullable();

            $table->string('paket');
            //paket reguler,islami
            $table->string('mata_pelajaran');

            $table->foreignUuid('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
