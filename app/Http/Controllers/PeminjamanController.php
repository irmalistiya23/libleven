<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menyimpan peminjaman baru
    public function simpanPeminjaman(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after_or_equal:tanggal_pinjam',
            'buku_id' => 'required|array',
            'buku_id.*' => 'exists:bukus,id',
        ]);

        // Buat peminjaman
        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(), // otomatis dari user yang login
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'status_peminjaman' => 'dipinjam', // default status
        ]);

        // Simpan relasi buku
        $peminjaman->bukus()->sync($request->buku_id);

        return redirect()->route('kelola-pengembalian')->with('success', 'Peminjaman berhasil!');
    }

    // Menampilkan daftar peminjaman dengan filter
    public function kelolaPengembalian(Request $request)
    {
        $query = Peminjaman::with(['user', 'bukus']);

        // Filter: status
        if ($request->status) {
            $query->where('status_peminjaman', $request->status);
        }

        // Filter: nama user
        if ($request->nama) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        // Filter: nama/kode buku
        if ($request->buku) {
            $query->whereHas('bukus', function ($q) use ($request) {
                $q->where('kode_buku', 'like', '%' . $request->buku . '%')
                  ->orWhere('NamaBuku', 'like', '%' . $request->buku . '%');
            });
        }

        // Sortir berdasarkan tanggal
        $sortOrder = $request->sort == 'terlama' ? 'asc' : 'desc';
        $query->orderBy('tanggal_pinjam', $sortOrder);

        $peminjamans = $query->get();

        return view('peminjaman.kelola-pengembalian', compact('peminjamans'));
    }

    // Menampilkan form pengembalian
    public function formPengembalian($id)
    {
        $peminjaman = Peminjaman::with('bukus', 'user')->findOrFail($id);
        return view('peminjaman.form-pengembalian', compact('peminjaman'));
    }

    // Mengupdate status pengembalian
    public function prosesPengembalian(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status_peminjaman = 'dikembalikan';
        $peminjaman->tanggal_pengembalian = now();
        $peminjaman->save();

        return redirect()->route('kelola-pengembalian')->with('success', 'Pengembalian berhasil!');
    }
}
