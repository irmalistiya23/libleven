<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();

            // Foreign key ke users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Ganti ke date jika tidak butuh waktu detail, atau tambah default/nullable
            $table->date('tanggal_pinjam');
            $table->date('tanggal_jatuh_tempo');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('peminjaman');
    }
};
