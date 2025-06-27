<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = 'kategori_bukus';
    
    protected $fillable = ['BukuID', 'KategoriID'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'KategoriID', 'id');
    }
}
