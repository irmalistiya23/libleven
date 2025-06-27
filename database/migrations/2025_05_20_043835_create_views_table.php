<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'buku_id']); // 1 user hanya 1 view per buku
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('views');
    }
};