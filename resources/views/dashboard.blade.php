@extends('master')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="container-dashboard">
        <h1>Dasbor</h1>
        <div class="card-container">
            <div class="card">
                <i class="bi bi-people"></i>
                <h3>Total Pengguna</h3>
                <p>{{ $totalUser }}</p>
            </div>
            <div class="card">
                <i class="bi bi-person-badge"></i>
                <h3>Total Petugas</h3>
                <p>{{ $totalPetugas }}</p>
            </div>
            <div class="card">
                <i class="bi bi-book"></i>
                <h3>Total Buku</h3>
                <p>{{ $totalBuku }}</p>
            </div>
            <div class="card">
                <i class="bi bi-tags"></i>
                <h3>Total Kategori</h3>
                <p>{{ $totalKategori }}</p>
            </div>
        </div>
    </div>
@endsection
