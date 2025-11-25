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
    Schema::create('Usuario_has_Anuncio', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('Usuario')->onDelete('cascade');
            $table->foreignId('announcement_id')->constrained('Anuncio')->onDelete('cascade');
            $table->primary(['user_id', 'announcement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuario_has_Anuncio');
    }
};
