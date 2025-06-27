<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserID',
        'BukuID',
        'Rating',
        'Ulasan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'id');
    }
    
}
