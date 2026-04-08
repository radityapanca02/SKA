<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            // Tambah kolom yang missing
            $table->string('page')->nullable()->after('user_agent');
            // Hapus timestamps karena kita pakai visited_at saja
            $table->dropTimestamps();
        });
    }

    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn('page');
            $table->timestamps();
        });
    }
};
