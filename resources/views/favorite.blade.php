@extends('master')

@section('konten')

<link rel="stylesheet" href="{{ asset('css/bookshelf.css') }}">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Buku Favorit Anda</h1>
    @if($favorites->isEmpty())
        <div class="empty-state text-center">
            <p class="fs-5">Anda belum menyukai buku apa pun.</p>
            <a href="{{ route('kategori') }}" class="btn btn-light mt-3">
                <i class="bi bi-plus-circle me-1"></i> Cari Buku
            </a>
        </div>
    @else
        <div class="row g-4">
        @foreach(auth()->user()->favorites as $favorite)
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('buku.show', $favorite->BukuID) }}" class="text-decoration-none text-dark">
            <div class="card book-card shadow-sm h-100">
                <img src="{{ asset('storage/cover_buku/' . $favorite->buku->CoverBuku) }}" alt="{{ $favorite->buku->NamaBuku }}" class="img-fluid">
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="card-title fw-bold">{{ $favorite->buku->NamaBuku }}</h6>
                    <p class="card-text flex-grow-1">{{ Str::limit($favorite->buku->deskripsi, 100) }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach

        </div>
    @endif
</div>

<script>
    function showDetail(coverUrl, title, desc) {
        document.getElementById('modalCover').src = coverUrl;
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDesc').textContent = desc;
        new bootstrap.Modal(document.getElementById('bookDetailModal')).show();
    }
</script>
@endsection
