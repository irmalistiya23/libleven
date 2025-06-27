<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kategori_bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BukuID');
            $table->unsignedBigInteger('KategoriID');
            $table->timestamps();

            $table->foreign('BukuID')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('KategoriID')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('kategori_bukus');
    }
};
