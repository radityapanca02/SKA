<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jurusan_statistiks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('departemen'); // ubah dari enum ke string untuk sederhana
            $table->string('type'); // ubah dari enum ke string
            $table->integer('jumlah')->default(0);
            $table->timestamps();

            // Unique constraint
            $table->unique(['tanggal', 'departemen', 'type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan_statistiks');
    }
};
