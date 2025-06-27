<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function store(Request $request, $bukuId)
    {
        $userId = Auth::id();

        $existing = View::where('user_id', $userId)
                        ->where('buku_id', $bukuId)
                        ->first();

        if (!$existing) {
            View::create([
                'user_id' => $userId,
                'buku_id' => $bukuId,
            ]);
        }

        return redirect()->route('buku.baca', $bukuId);
    }
}
