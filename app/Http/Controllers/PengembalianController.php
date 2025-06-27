<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class PengembalianController extends Controller
{
    public function store(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
            'buku_ids' => 'required|array'
        ]);

        foreach ($request->buku_ids as $bukuId) {
            $jatuhTempo = Carbon::parse($peminjaman->tanggal_jatuh_tempo);
            $tanggalKembali = Carbon::parse($request->tanggal_kembali);

            $denda = 0;

            if ($tanggalKembali->gt($jatuhTempo)) {
                // Hitung dari H+1 jatuh tempo sampai tanggal kembali
                $periode = CarbonPeriod::create($jatuhTempo->copy()->addDay(), $tanggalKembali);

                $hariKerja = 0;
                foreach ($periode as $date) {
                    // 0 = Minggu, 6 = Sabtu, kita skip
                    if (!in_array($date->dayOfWeek, [0, 6])) {
                        $hariKerja++;
                    }
                }

                $denda = $hariKerja * 1000;
            }

            $peminjaman->bukus()->updateExistingPivot($bukuId, [
                'tanggal_kembali' => $tanggalKembali,
                'denda' => $denda,
            ]);
        }

        // Update status peminjaman
        $totalBuku = $peminjaman->bukus()->count();
        $bukuKembali = $peminjaman->bukus()->whereNotNull('peminjaman_bukus.tanggal_kembali')->count();
        $status = $totalBuku == $bukuKembali ? 'dikembalikan' : 'dipinjam';

        $peminjaman->update([
            'status_peminjaman' => $status
        ]);

        return redirect()->back()->with('success', 'Pengembalian berhasil diproses.');
    }
}
