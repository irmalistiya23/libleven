<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KategoriBuku;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('manage-kategori', compact('kategoris')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaKategori' => 'required|unique:kategoris,NamaKategori|max:255',
        ]);

        Kategori::create([
            'NamaKategori' => $request->NamaKategori,
        ]);

        return redirect()->route('manage-kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('manage-kategori')->with('success', 'Kategori berhasil dihapus!');
    }

    public function manageBukuKategori()
    {

    $bukus = Buku::with('kategoris')->get(); // Ambil semua buku beserta kategori yang terkait
    $kategoris = Kategori::all(); // Ambil semua kategori

    return view('manage-buku-kategori', compact('bukus', 'kategoris'));
    }


    public function storeBukuKategori(Request $request)
    {
        $request->validate([
            'BukuID' => 'required|exists:bukus,id',
            'KategoriID' => 'required|exists:kategoris,id',
        ]);

        KategoriBuku::create([
            'BukuID' => $request->BukuID,
            'KategoriID' => $request->KategoriID,
        ]);

        return redirect()->route('manage-buku-kategori')->with('success', 'Kategori buku berhasil ditambahkan!');
    }

    public function destroyBukuKategori($id)
    {
        KategoriBuku::findOrFail($id)->delete();
        return redirect()->route('manage-buku-kategori')->with('success', 'Kategori buku berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Update kategori yang dipilih
        $buku->kategoris()->sync($request->KategoriID);

        return redirect()->back()->with('success', 'Kategori buku berhasil diperbarui.');
    }
}
