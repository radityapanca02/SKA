<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('visited_at');
            $table->index(['is_active', 'visited_at']);
        });
    }

    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
