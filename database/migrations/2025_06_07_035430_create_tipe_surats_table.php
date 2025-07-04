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
        Schema::create('tipe_surats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('template_view')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_surats');
    }
};
