<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use App\Models\User;

class BlogController extends Controller
{
    
    //sebelum login
    public function welcome()
    {
        $bookCount = Buku::count();
        $categoriesCount = Kategori::count();
        $reviewCount = Ulasan::count();
        $userCount = User::count();
    
        // Ambil hanya top 3 buku berdasarkan jumlah views terbanyak
        $bukus = Buku::withCount('views')
            ->orderBy('views_count', 'desc')
            ->take(3)
            ->get();
    
        return view('welcome', compact('bookCount', 'categoriesCount', 'reviewCount', 'userCount', 'bukus'));
    }


    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    // Setelah login
    public function home()
    {
        return view('home');
    }

    public function bookshelf()
    {
        return view('bookshelf');
    }

    public function favorite()
    {
        return view('favorite');
    }

    public function chatcs()
    {
        return view('chatcs');
    }

    public function account()
    {
        return view('account');
    }
}
