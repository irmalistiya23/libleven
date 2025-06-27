<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:1000',
        ]);

        Ulasan::create([
            'BukuID' => $request->buku_id,
            'UserID' => auth()->id(),
            'Rating' => $request->rating,
            'Ulasan' => $request->ulasan,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        if ($ulasan->UserID !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string'
        ]);

        $ulasan->update([
            'Rating' => $validated['rating'],
            'Ulasan' => $validated['ulasan']
        ]);

        return redirect()->back()->with('success', 'Review updated successfully.');
    }

    public function destroy(Ulasan $ulasan)
    {
        if ($ulasan->UserID !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $ulasan->delete();
        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}