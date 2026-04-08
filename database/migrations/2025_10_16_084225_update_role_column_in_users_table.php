<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Jika menggunakan ENUM
            $table->enum('role', ['SUPERADMIN', 'ADMIN', 'EDITOR'])->change();

            // Atau jika menggunakan VARCHAR
            // $table->string('role', 20)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan ke nilai sebelumnya jika perlu
            $table->enum('role', ['SUPERADMIN', 'EDITOR', 'VIEWER'])->change();
        });
    }
};
