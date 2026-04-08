<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('deskripsi', 175);
            $table->text('content');
            $table->string('gambar')->nullable()->default('default.svg');
            $table->integer('views')->default(0);
            $table->enum('type', ['PRESTASI', 'KEGIATAN', 'PENGUMUMAN', 'ACARA']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
