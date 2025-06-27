<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LibLeven</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
</head>
<body>
    <div class="sidebar">
        <div class="text-center">
            {{-- <img src="" alt="">MindSpark
        </div>
        <div class="text-center">
            <img src="{{ Auth::user()->foto_url }}" alt="User Avatar" class="user-avatar img-fluid rounded-circle"> --}}

            <img src="" alt="">LibLeven
        </div>
        <div class="text-center">
            @if(Auth::check())
                <img src="{{ Auth::user()->foto_url }}" alt="User Avatar" class="user-avatar img-fluid rounded-circle">
            @else
                <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Default Avatar" class="user-avatar img-fluid rounded-circle">
            @endif
        </div>
        <div class="text-center">
            <strong>{{ Auth::user()->nama }}</strong>
        </div>
        <hr>
        <a href="{{ route('account') }}" class="d-block {{ request()->is('account') ? 'active' : '' }}">
            <i class="bi bi-person icon-custom"></i> Akun
        </a>

        @if(Auth::user()->role == 'user')
        <a href="{{ route('kategori') }}" class="d-block {{ request()->is('kategori') ? 'active' : '' }}">
            <i class="bi bi-house icon-custom"></i> Beranda
        </a>
        <a href="{{ route('bookshelf') }}" class="d-block {{ request()->is('bookshelf') ? 'active' : '' }}">
            <i class="bi bi-bookshelf icon-custom"></i> Rak Buku
        </a>
        <a href="{{ route('favorite') }}" class="d-block {{ request()->is('favorite') ? 'active' : '' }}">
            <i class="bi bi-star icon-custom"></i> Favorit
        </a>
        <a href="{{ route('chatcs') }}" class="d-block {{ request()->is('chatcs') ? 'active' : '' }}">
            <i class="bi bi-chat icon-custom"></i> Chat CS
        </a>


        @elseif(Auth::user()->role == 'administrator' || Auth::user()->role == 'petugas')
        <hr>
        <div class="text-center">
            <p>Kelola</p>
        </div>
        <hr>
        <a href="{{ route('dashboard') }}" class="d-block {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-clipboard icon-custom"></i> Dasbor
        </a>
        <a href="{{ route('kelola-pengembalian') }}" class="d-block {{ request()->is('kelola-pengembalian') ? 'active' : '' }}">
            <i class="bi bi-view-list icon-custom"></i> Kembalikan Buku
        </a>
        <a href="{{ route('kelola-peminjaman') }}" class="d-block {{ request()->is('kelola-peminjaman') || request()->is('form-peminjaman/*') ? 'active' : '' }}">
            <i class="bi bi-view-list icon-custom"></i> Pinjam Buku

        </a>
        <a href="{{ route('manage-buku') }}" class="d-block {{ request()->is('manage-buku') ? 'active' : '' }}">
            <i class="bi bi-book icon-custom"></i> Buku
        </a>
        <a href="{{ route('manage-kategori') }}" class="d-block {{ request()->is('manage-kategori') ? 'active' : '' }}">
            <i class="bi bi-tags icon-custom"></i> Kategori
        </a>
        <a href="{{ route('manage-buku-kategori') }}" class="d-block {{ request()->is('manage-buku-kategori') ? 'active' : '' }}">
            <i class="bi bi-journal-bookmark icon-custom"></i> Kategori Buku
        </a>

            @if(Auth::user()->role == 'administrator')
            <a href="{{ route('manage-user') }}" class="d-block {{ request()->is('manage-user') ? 'active' : '' }}">
                <i class="bi bi-chat icon-custom"></i> Pengguna
            </a>
            @endif

            <a href="{{ route('laporan.index') }}" class="d-block {{ request()->is('laporan') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> Laporan
        </a>
        <a href="{{ route('register') }}" class="d-block {{ request()->is('register') ? 'active' : '' }}">
               <i class="bi bi-journal-bookmark icon-custom"></i> Registrasi
        </a>
        @endif
        <div class="logout-section">
            <a href="#" class="d-block logout-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right icon-custom"></i> Keluar
            </a>
        </div>
    </div>

    <main>
        @yield('konten')
    </main>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>