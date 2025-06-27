<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPeminjamanBukusTable extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_bukus', function (Blueprint $table) {
            $table->date('tanggal_kembali')->nullable();
            $table->integer('denda')->nullable();
        });
    }

    public function down()
    {
        Schema::table('peminjaman_bukus', function (Blueprint $table) {
            $table->dropColumn(['tanggal_kembali', 'denda']);
        });
    }
}