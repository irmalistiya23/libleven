@extends('navbar')

@section('konten')
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-center">

        <!-- Left Content -->
        <div class="col-lg-6">
          <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
            <h1 class="mb-4">
              Selamat Datang di <br>
              <span class="accent-text">LibLeven</span>
            </h1>

            <p class="mb-4 mb-md-5">
              Jelajahi koleksi buku, jurnal, dan artikel dari berbagai bidang sains.
            </p>

            <!-- Buttons -->
            <div class="hero-buttons">
              @auth
                <a href="{{ route('kategori') }}" class="btn btn-primary mx-1">Mulai</a>
              @else
                <a href="{{ route('login') }}" class="btn btn-primary mx-1">Mulai</a>
              @endauth

              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-link mt-2 mt-sm-0 glightbox">
                <i class="bi bi-play-circle me-1"></i> Putar Video
              </a>
            </div>
          </div>
        </div>

        <!-- Right Image -->
        <div class="col-lg-6">
          <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
            <img src="assets/img/book-hero.png" alt="Hero Image" class="img-fluid">
          </div>
        </div>
      </div>

      <!-- Statistics -->
      <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
        <div class="col-lg-3 col-md-6">
          <div class="stat-item">
            <div class="stat-icon"><i class="bi bi-journal-richtext"></i></div>
            <div class="stat-content">
              <h4>{{ $bookCount }}+</h4>
              <p class="mb-0">Buku Tersedia</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="stat-item">
            <div class="stat-icon"><i class="bi bi-collection"></i></div>
            <div class="stat-content">
              <h4>{{ $categoriesCount }}+</h4>
              <p class="mb-0">Jumlah Kategori</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="stat-item">
            <div class="stat-icon"><i class="bi bi-award"></i></div>
            <div class="stat-content">
              <h4>{{ $reviewCount }}+</h4>
              <p class="mb-0">Jumlah Ulasan dan Rating</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="stat-item">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <div class="stat-content">
              <h4>{{ $userCount }}+</h4>
              <p class="mb-0">Jumlah Pengguna</p>
            </div>
          </div>
        </div>
      </div>

      <br>
      <h2 class="text-center mb-4">Preview Buku Terpopuler</h2>
      <div class="row justify-content-center">
        @foreach ($bukus as $buku)
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card h-100 shadow-sm position-relative">
              @if($loop->index < 3)
                <div class="corner-ribbon rank-{{ $loop->index + 1 }}">
                  🏅 Top {{ $loop->index + 1 }}
                </div>
              @endif
              <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" alt="{{ $buku->NamaBuku }}" class="img-fluid" />
              <div class="card-body">
                <h5 class="card-title">{{ $buku->NamaBuku }}</h5>
                <p class="card-text"><small class="text-muted">{{ $buku->penulis }}</small></p>
                <p class="card-text">{{ Str::limit($buku->deskripsi, 80) }}</p>
              </div>
              <div class="card-footer">
                <small><i class="bi bi-eye me-1"></i> {{ $buku->views_count }} views</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<footer class="custom-footer mt-5">
  <div class="text-center">
    <p class="footer-text mb-1">
      &copy; {{ date('Y') }} LibLeven. All rights reserved.
    </p>
    <div class="footer-social">
      <a href="#" class="footer-link"><i class="bi bi-facebook"></i></a>
      <a href="#" class="footer-link"><i class="bi bi-twitter"></i></a>
      <a href="#" class="footer-link"><i class="bi bi-instagram"></i></a>
      <a href="#" class="footer-link"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</footer>
@endsection