<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('laporan')) {
            Schema::create('laporan', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('email');
                $table->string('subjek');
                $table->text('pesan');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
