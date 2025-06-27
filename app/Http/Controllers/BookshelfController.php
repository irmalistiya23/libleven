<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class BookshelfController extends Controller
{
public function index()
{
    $userId = auth()->user()->id;

    $borrowedBooks = Peminjaman::where('user_id', $userId)
        ->where('status_peminjaman', 'Dipinjam') 
        ->with('bukus')
        ->get();

    $returnedBooks = Peminjaman::where('user_id', $userId)
        ->where('status_peminjaman', 'Dikembalikan') 
        ->with('bukus')
        ->get();

    return view('bookshelf', compact('borrowedBooks', 'returnedBooks'));
}


}
