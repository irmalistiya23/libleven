<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->string('kode_buku')->unique()->after('id');
            $table->integer('stok')->default(0)->after('kode_buku');
        });
    }

    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropColumn(['kode_buku', 'stok']);
        });
    }
};