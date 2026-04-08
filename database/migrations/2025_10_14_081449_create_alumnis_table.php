<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_alumnis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('graduation', 50);
            $table->string('position', 100);
            $table->string('company', 100);
            $table->text('description');
            $table->string('image');
            $table->string('bg_color', 50)->default('from-[#2ECC71] to-[#27AE60]');
            $table->json('achievements')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
