<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\User;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'tanggal_pinjam',
        'tanggal_jatuh_tempo',
        'status_peminjaman', 
    ];

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_bukus', 'peminjaman_id', 'buku_id')
        ->withPivot('tanggal_kembali', 'denda')
        ->withTimestamps();    }

        
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
