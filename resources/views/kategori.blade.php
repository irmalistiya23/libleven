@extends('master')
@section('konten')
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>LibLeven</title>
    <style>
        .book-card img {
        width: 100%;
        aspect-ratio: 2 / 3;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div class="container mt-12">
        <div class="row mb-4 align-items-center">
            <!-- Search Bar -->
            <div class="col-md-12 text-end">
                <div class="search-container search-bar">
                    <form action="{{ $action ?? request()->url() }}" method="GET" class="search-form">
                        @foreach(request()->except(['search', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <div class="search-wrapper d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Buku apa yang anda cari...." value="{{ request('search') }}">
                            <button type="submit" class="btn" style="background-color: #8de3ff; border-color: #8de3ff; color: black;">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div><br>

              <!--Carousel Image-->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('storage/cover_buku/buku.jpg') }}" class="d-block w-100" alt="Buku 1">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('storage/cover_buku/buku2.jpg') }}" class="d-block w-100" alt="Buku 2">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('storage/cover_buku/buku3.jpg') }}" class="d-block w-100" alt="Buku 3">
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div class="col-md-12">
                <div class="category-container mb-4">
                    <h2 class="category-title">Kategori</h2>
                    <div class="category-list d-flex flex-wrap gap-2">
                        <a href="{{ route('kategori') }}" 
                           class="btn btn-outline-primary {{ !request('KategoriID') ? 'active' : '' }}">
                           Semua Kategori
                        </a>
                        @foreach($kategoris as $kategori)
                            <a href="{{ route('kategori', ['KategoriID' => $kategori->id]) }}" 
                               class="btn btn-outline-primary {{ request('KategoriID') == $kategori->id ? 'active' : '' }}">
                                {{ $kategori->NamaKategori }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Daftar Buku -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @forelse($bukus as $buku)
            <div class="col">
                <div class="book-card h-100">
                    <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none">
                        @if($buku->CoverBuku)
                            <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" alt="{{ $buku->NamaBuku }}" class="img-fluid">
                        @else
                            <div class="no-image">Gambar tidak tersedia</div>
                        @endif
                        <div class="book-info">
                            <h5 class="book-title">{{ $buku->NamaBuku }}</h5>
                            <p class="book-author">{{ $buku->penulis }}</p>
                            <p class="book-category">
                                Kategori: 
                                @foreach($buku->kategoris as $kategori)
                                    <span class="badge bg-primary">{{ $kategori->NamaKategori }}</span>
                                @endforeach
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Buku tidak ditemukan.
                </div>
            </div>
            @endforelse
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html></html>
@endsection