<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AccountController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//sebelum login
Route::get('/welcome', [BlogController::class, 'welcome'])->name('welcome');
Route::get('/about', [BlogController::class, 'about'])->name('about');
Route::get('/contact', [BlogController::class, 'contact'])->name('contact');

Route::get('/generate-password', function () {
    return bcrypt('admin123');
});

//register diatur administrator
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//setelah login
Route::get('/welcome', [BlogController::class, 'welcome'])->name('welcome');
Route::get('/home', [BlogController::class, 'home'])->name('home');

Route::get('/account', [BlogController::class, 'account'])->name('account');
Route::put('/account/update', [UserController::class, 'update'])->name('account.update')->middleware('auth');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/account', [AccountController::class, 'index'])->name('account');
//     Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
//     Route::put('/account/update-photo', [AccountController::class, 'updatePhoto'])->name('account.updatePhoto');
// });

Route::get('/bookshelf', [BookshelfController::class, 'index'])->name('bookshelf');

Route::get('/favorite', [BlogController::class, 'favorite'])->name('favorite');
Route::get('/chatcs', [BlogController::class, 'chatcs'])->name('chatcs');

//ngatur login register logout
Route::get('/', [BlogController::class, 'index'])->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//register dari petugas
Route::post('/register', [UserController::class, 'store'])->name('register');

// Route Kategori dan Buku
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
Route::get('/buku/baca/{id}', [BukuController::class, 'baca'])->name('buku.baca');


// Route Ulasan
Route::middleware(['auth'])->group(function () {
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
});

// Route untuk Manajemen User
Route::get('/manage-user', [ManageController::class, 'index'])->name('manage-user');
Route::delete('/manage-user/{id}', [ManageController::class, 'destroy'])->name('manage-user.destroy');

Route::get('books/create', [ManageController::class, 'create'])->name('books.create');
Route::get('books/edit/{id}', [ManageController::class, 'edit'])->name('books.edit');

// Route untuk Manajemen Buku
Route::prefix('manage-buku')->group(function () {
    Route::get('/', [ManageController::class, 'indexBuku'])->name('manage-buku');
    Route::post('/store', [ManageController::class, 'store'])->name('manage-buku.store');
    Route::put('/update/{id}', [ManageController::class, 'update'])->name('manage-buku.update');
    Route::delete('/destroy/{id}', [ManageController::class, 'destroyBook'])->name('manage-buku.destroy');
    Route::patch('/books/{id}/ketersediaan', [BukuController::class, 'updateKetersediaan'])->name('books.updateKetersediaan');

});

// manage kategori dan kategori buku
Route::get('/manage-kategori', [KategoriBukuController::class, 'index'])->name('manage-kategori');
Route::post('/manage-kategori/store', [KategoriBukuController::class, 'store'])->name('kategori.store');
Route::delete('/manage-kategori/{id}', [KategoriBukuController::class, 'destroy'])->name('kategori.destroy');

Route::get('/manage-buku-kategori', [KategoriBukuController::class, 'manageBukuKategori'])->name('manage-buku-kategori');
Route::post('/manage-buku-kategori/store', [KategoriBukuController::class, 'storeBukuKategori'])->name('buku-kategori.store');
Route::delete('/manage-buku-kategori/{id}', [KategoriBukuController::class, 'destroyBukuKategori'])->name('buku-kategori.destroy');
Route::put('/manage-buku-kategori/{id}', [KategoriBukuController::class, 'update'])->name('buku-kategori.update');

//manage laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard'); // <--- Tambahkan ini

// Route untuk menambah atau menghapus buku dari favorit
Route::post('/favorite/{action}/{bukuId}', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');

// Route untuk melihat daftar buku favorit
Route::get('/favorite', [FavoriteController::class, 'favoriteList'])->name('favorite');

//peminjaman

Route::post('/borrow/{id}', [PeminjamanController::class, 'borrow'])->name('borrow');
Route::get('/loaning-list', [PeminjamanController::class, 'index'])->name('loaning-list');
Route::put('/loaning-list/{id}', [PeminjamanController::class, 'update'])->name('loaning-list.update');
Route::delete('/loaning-list/{id}', [PeminjamanController::class, 'destroy'])->name('loaning-list.destroy');

// Routes for Ulasan (Reviews)
Route::middleware(['auth'])->group(function () {
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    Route::put('/ulasan/{ulasan}', [UlasanController::class, 'update'])->name('ulasan.update');
    Route::delete('/ulasan/{ulasan}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});



//PEMINJAMAN
Route::get('/kelola-peminjaman', [UserController::class, 'kelolaPeminjaman'])->name('kelola-peminjaman');
Route::get('/form-peminjaman/{id}', [UserController::class, 'formPeminjaman'])->name('form-peminjaman');
Route::get('/ajax/buku', [UserController::class, 'getBukuList'])->name('ajax.buku');

Route::post('/form-peminjaman', [PeminjamanController::class, 'store'])->name('simpan-peminjaman');
// Route::post('/simpan-peminjaman', [PeminjamanController::class, 'store'])->name('simpan-peminjaman');

Route::post('/simpan-peminjaman', [PeminjamanController::class, 'simpanPeminjaman'])->name('simpan-peminjaman');


// Route::get('/kelola-pengembalian', [PeminjamanController::class, 'index'])->name('kelola-pengembalian');

// ini buat klik tombol "kembalikan" nanti
Route::post('/peminjaman', [PeminjamanController::class, 'simpanPeminjaman'])->name('simpan-peminjaman');

Route::get('/kelola-pengembalian', [PeminjamanController::class, 'kelolaPengembalian'])->name('kelola-pengembalian');
Route::get('/peminjaman/form-pengembalian/{id}', [PeminjamanController::class, 'formPengembalian'])->name('peminjaman.form-pengembalian');

Route::post('/pengembalian/{peminjaman}', [PengembalianController::class, 'store'])->name('pengembalian.store');

//views 
Route::post('/buku/baca/{id}', [ViewController::class, 'store'])->name('buku.baca')->middleware('auth');
?>