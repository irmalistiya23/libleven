<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        return view('account'); // sesuaikan nama view kamu
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/fotos/' . $user->foto);
            }

            $filename = $request->file('foto')->store('public/fotos');
            $filename = basename($filename);

            $user->foto = $filename;
            $user->save();

            return redirect()->back()->with('success', 'Foto berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Foto gagal diperbarui.');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Data profil berhasil diperbarui.');
    }
}
