<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropColumn('tanggal_terbit');
        });
    }

    public function down()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->date('tanggal_terbit')->nullable(); // atau sesuaikan dengan tipe sebelumnya
        });
    }

};
