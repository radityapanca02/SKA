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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('heroImage')->nullable();
            $table->string('heroTitle', 30);

            $table->text('profilImage1')->nullable();
            $table->text('profilImage2')->nullable();
            $table->text('profilImage3')->nullable();
            $table->string('profilDesc', 500);

            $table->text('visiImage')->nullable();
            $table->string('visiImageName', 200);
            $table->string('visiDesc', 500);

            $table->text('youtubeSrc');

            $table->timestamps();
        });

        Schema::create('misis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained()->onDelete('cascade');
            $table->text('misiImage')->nullable();
            $table->string('misiTitle', 40);
            $table->string('misiDesc', 200);
            $table->enum('misiColor', ['BLUE', 'GREEN', 'ORANGE', 'RED']);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('misis');
        Schema::dropIfExists('profils');
    }
};
