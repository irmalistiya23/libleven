<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel 'laporans'
        $laporans = DB::table('laporan')->get();

        // Kirim data ke view 'laporan' (buat file laporan.blade.php)
        return view('laporan', compact('laporans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);
    
        try {
            DB::table('laporan')->insert([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'subjek' => $validated['subjek'],
                'pesan' => $validated['pesan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal insert laporan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
