<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nis', 
        'nama',
        'email', 
        'alamat', 
        'password', 
        'foto', 
        'role'];

    public function favorits()
    {
        return $this->hasMany(Favorit::class, 'UserID');
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class, 'UserID');
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'UserID');
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('assets/img/avatar.png');
    }

    
     //relasi ke model favorit
    public function favorites()
    {
        return $this->hasMany(Favorit::class, 'UserID');
    }
 
    public function hasFavorited($bukuId)
    {
        return $this->favorites()->where('BukuID', $bukuId)->exists();
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }
}
