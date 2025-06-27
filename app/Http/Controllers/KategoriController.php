<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Buku;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar dengan eager loading kategori
        $query = Buku::with('kategoris');
        
        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('NamaBuku', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kategori
        if ($request->has('KategoriID') && $request->KategoriID != '') {
            $query->whereHas('kategoris', function($q) use ($request) {
                $q->where('kategoris.id', $request->KategoriID);
            });
        }

        $bukus = $query->get();
        $kategoris = Kategori::all();

        return view('kategori', compact('bukus', 'kategoris'));
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $bukus = Buku::where('KategoriId', $id)->get();
        return view('kategori', compact('kategori', 'bukus'));
    }
}
