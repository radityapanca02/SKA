<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['SUPERADMIN', 'EDITOR', 'VIEWER'])->default('VIEWER')->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['SUPERADMIN', 'EDITOR'])->default('EDITOR')->change();
        });
    }
};
