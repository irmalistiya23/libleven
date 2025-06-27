<?php
namespace App\Http\Controllers;

use App\Models\Favorit;  // Menggunakan model Favorit
use App\Models\Buku;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request, $action, $bukuId)
    {
        $user = auth()->user();
        $buku = Buku::findOrFail($bukuId);

        // Mengecek apakah buku sudah ada di favorit pengguna
        $favorite = Favorit::where('UserID', $user->id)->where('BukuID', $bukuId)->first();

        // Menambahkan ke favorit jika belum ada
        if ($action == 'add') {
            if (!$favorite) {
                Favorit::create([
                    'UserID' => $user->id,
                    'BukuID' => $bukuId,
                ]);
            }
        } 
        // Menghapus dari favorit jika sudah ada
        elseif ($action == 'remove') {
            if ($favorite) {
                $favorite->delete();
            }
        }

        // Redirect kembali ke halaman yang sebelumnya
        return redirect()->back();
    }

    public function favoriteList()
    {
        // Mendapatkan daftar buku favorit dari pengguna yang sedang login
        $favorites = auth()->user() ? auth()->user()->favorites : [];

        // Kirim data ke view 'favorite.index'
        return view('favorite', compact('favorites'));
    }
}
