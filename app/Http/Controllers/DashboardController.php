<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total user dengan role 'user'
        $totalUser = User::where('role', 'user')->count();

        // Hitung total petugas dengan role 'petugas'
        $totalPetugas = User::where('role', 'petugas')->count();

        // Hitung total buku
        $totalBuku = Buku::count();

        // Hitung total kategori
        $totalKategori = Kategori::count();

        return view('dashboard', compact('totalUser', 'totalPetugas', 'totalBuku', 'totalKategori'));
    }
}
