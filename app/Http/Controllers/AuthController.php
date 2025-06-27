<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil data user yang sedang login
    
            // Cek role user dan tentukan halaman tujuan
            if ($user->role == 'administrator' || $user->role == 'petugas') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('kategori');
            }
        }
    
        return back()->with('error', 'Email atau password salah.');
    }
    

    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:users,nis',
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
