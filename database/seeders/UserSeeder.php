<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['nis' => 12345, 'nama' => 'Admin', 'email' => 'admin@example.com', 'alamat' => 'Jakarta', 'password' => Hash::make('password'), 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => 67890, 'nama' => 'User', 'email' => 'user@example.com', 'alamat' => 'Bandung', 'password' => Hash::make('password'), 'role' => 'user', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('kategoris')->insert([
            ['NamaKategori' => 'Fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['NamaKategori' => 'Non-Fiksi', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('bukus')->insert([
            ['NamaBuku' => 'Laskar Pelangi', 'deskripsi' => 'Novel inspiratif', 'penerbit' => 'Bentang Pustaka', 'penulis' => 'Andrea Hirata', 'tanggal_terbit' => Carbon::now(), 'created_at' => now(), 'updated_at' => now()],
            ['NamaBuku' => 'Atomic Habits', 'deskripsi' => 'Buku self-improvement', 'penerbit' => 'Penguin', 'penulis' => 'James Clear', 'tanggal_terbit' => Carbon::now(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('kategori_bukus')->insert([
            ['BukuID' => 1, 'KategoriID' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['BukuID' => 2, 'KategoriID' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('peminjaman')->insert([
            ['UserID' => 2, 'BukuID' => 1, 'TanggalPeminjaman' => Carbon::now(), 'TanggalPengembalian' => Carbon::now()->addDays(7), 'StatusPeminjaman' => 'Dipinjam', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('ulasans')->insert([
            ['UserID' => 2, 'BukuID' => 1, 'Ulasan' => 'Buku yang sangat menginspirasi.', 'Rating' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('favorits')->insert([
            ['UserID' => 2, 'BukuID' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
