<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('action'); // LOGIN, CREATE, UPDATE, DELETE, LOGOUT
            $table->string('model_type')->nullable(); // App\Models\Alumni, dll
            $table->unsignedBigInteger('model_id')->nullable();
            $table->text('description');
            $table->text('old_data')->nullable();
            $table->text('new_data')->nullable();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
};
