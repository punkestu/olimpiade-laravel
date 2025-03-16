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
        Schema::table('users', function (Blueprint $table) {
            $table->string('asal_sekolah')->nullable();
            $table->string('kelas')->nullable();
            $table->string('nomor_hp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('asal_sekolah');
            $table->dropColumn('kelas');
            $table->dropColumn('nomor_hp');
        });
    }
};
