<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('favorits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('BukuID');
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('BukuID')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('favorits');
    }
};
