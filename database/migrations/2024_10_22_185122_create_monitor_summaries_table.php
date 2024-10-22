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
        Schema::create('monitor_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->boolean("is_focused")->default(true);
            $table->boolean("is_fullscreen")->default(false);
            $table->string("screen_window_size")->default("1024x768 1024x768");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor_summaries');
    }
};
