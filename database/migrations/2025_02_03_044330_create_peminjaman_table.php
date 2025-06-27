<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('BukuID');
            $table->date('TanggalPeminjaman'); // Ganti dari timestamp ke date
            $table->date('TanggalPengembalian')->nullable(); // Nullable agar tidak wajib isi saat awal
            $table->string('StatusPeminjaman');
            $table->timestamps();

            // Relasi foreign key
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('BukuID')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('peminjaman');
    }
};
