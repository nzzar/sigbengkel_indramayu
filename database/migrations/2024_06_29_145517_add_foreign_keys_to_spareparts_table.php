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
        Schema::table('spareparts', function (Blueprint $table) {
            // Menambahkan foreign key
            $table->foreign('bengkel_id')->references('id')->on('bengkels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spareparts', function (Blueprint $table) {
            $table->dropForeign(['bengkel_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
