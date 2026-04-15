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
            $table->string('departemen');
            $table->string('type');
            $table->integer('jumlah')->default(0);
            $table->timestamps();

            $table->unique(['tanggal', 'departemen', 'type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan_statistiks');
    }
};
