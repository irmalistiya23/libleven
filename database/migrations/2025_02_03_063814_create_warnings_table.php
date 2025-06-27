<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('warnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->enum('pelanggaran', [
                'Terlambat Mengembalikan',
                'Merusak Buku',
                'Menghilangkan Buku',
                'Meminjam Melebihi Batas'
            ]);
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('warnings');
    }
};
