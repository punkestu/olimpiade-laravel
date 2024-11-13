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
        Schema::table('questions', function (Blueprint $table) {
            $table->text('question')->change();
            $table->text('answer1')->change();
            $table->text('answer2')->change();
            $table->text('answer3')->change();
            $table->text('answer4')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('question')->change();
            $table->string('answer1')->change();
            $table->string('answer2')->change();
            $table->string('answer3')->change();
            $table->string('answer4')->change();
        });
    }
};
