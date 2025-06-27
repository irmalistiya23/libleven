<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $fillable = ['UserID', 'BukuID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
}
