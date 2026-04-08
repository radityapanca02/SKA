<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_marquees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marquees', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marquees');
    }
};
