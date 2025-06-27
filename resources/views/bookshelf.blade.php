@extends('master')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/bookshelf.css') }}">

<div class="container mt-4 tab-wrapper body-borrowed" id="tab-wrapper">
    <h1>Rak Bukumu</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="tab-container">
        <button onclick="showTab('borrowed')" class="tab-btn active borrowed" id="btn-borrowed">Dipinjam</button>
        <button onclick="showTab('returned')" class="tab-btn returned" id="btn-returned">Dikembalikan</button>
    </div>

<div id="tab-borrowed" class="tab-content active">
    <div class="section borrowed-section">
        <h2 class="text-center">Buku yang Dipinjam</h2>
        <div class="row justify-content-center">
            @forelse($borrowedBooks as $pinjam)
          <div class="col-12 mb-3">
    <div class="p-3 border rounded bg-light shadow-sm">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div><strong>ID Peminjaman:</strong> {{ $pinjam->id }}</div>
            <div><strong>Total Buku:</strong> {{ $pinjam->bukus->count() }}</div>
        </div>
    </div>
</div>


                @foreach($pinjam->bukus as $buku)
@php
    $jatuhTempo = \Carbon\Carbon::parse($pinjam->tanggal_jatuh_tempo);
    $hariIni = \Carbon\Carbon::now();
    $hariTerlambat = 0;

    if ($hariIni->gt($jatuhTempo)) {
        $periode = \Carbon\CarbonPeriod::create($jatuhTempo->copy()->addDay(), $hariIni);
        foreach ($periode as $date) {
            if (!in_array($date->dayOfWeek, [0, 6])) {
                $hariTerlambat++;
            }
        }
    }
    $isLate = $hariTerlambat > 0;
@endphp

<div class="col-md-5 mb-4">
   <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 {{ $isLate ? 'border border-danger shadow' : 'shadow-sm' }}">
                            @if($buku->CoverBuku)
                                <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" class="card-img-top" alt="{{ $buku->NamaBuku }}">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px; background-color: #f0f0f0;">
                                    Gambar Tidak Tersedia
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    {{ $buku->NamaBuku }}
                                    @if($isLate)
                                        <span class="badge bg-danger ms-2">Terlambat</span>
                                    @endif
                                </h5>
                                <p class="card-text">{{ $buku->penulis ?? 'Penulis tidak tersedia' }}</p>
                                <div class="info mt-auto">
                                    <p>Dipinjam: <strong>{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('Y-m-d') }}</strong></p>
                                    <p>Jatuh Tempo: <strong>{{ $jatuhTempo->format('Y-m-d') }}</strong></p>
                                    @if($isLate)
                                        <p class="text-danger">Terlambat <strong>{{ $hariTerlambat }} hari kerja</strong></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
</div>

                @endforeach
            @empty
                <p class="text-center">Belum ada buku yang dipinjam.</p>
            @endforelse
        </div>
    </div>
</div>

<div id="tab-returned" class="tab-content">
    <div class="section returned-section">
        <h2 class="text-center">Buku yang Dikembalikan</h2>
        <div class="row justify-content-center">
          @forelse($returnedBooks as $pinjam)
        <div class="col-12 mb-3">
    <div class="p-3 border rounded bg-light shadow-sm">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div><strong>ID Peminjaman:</strong> {{ $pinjam->id }}</div>
            <div><strong>Total Buku:</strong> {{ $pinjam->bukus->count() }}</div>
        </div>
    </div>
</div>


    @foreach($pinjam->bukus as $buku)
        <div class="col-md-5 mb-4">
<a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            @if($buku->CoverBuku)
                                <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" class="card-img-top" alt="{{ $buku->NamaBuku }}">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px; background-color: #f0f0f0;">
                                    Gambar Tidak Tersedia
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $buku->NamaBuku }}</h5>
                                <p class="card-text">{{ $buku->penulis ?? 'Penulis tidak tersedia' }}</p>
                                <div class="info mt-auto">
                                    <p>Dipinjam: <strong>{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('Y-m-d') }}</strong></p>
                                    <p>Dikembalikan: <strong>{{ optional($buku->pivot)->tanggal_kembali ?? '-' }}</strong></p>
                                    <p class="text-danger">Denda: <strong>Rp {{ number_format($buku->pivot->denda, 0, ',', '.') }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </a>
        </div>
    @endforeach
@empty
    <p class="text-center">Belum ada buku yang dikembalikan.</p>
@endforelse

        </div>
    </div>
</div>  
</div>

<script>
    function showTab(tab) {
        const wrapper = document.getElementById('tab-wrapper');
        const tabBorrowed = document.getElementById('tab-borrowed');
        const tabReturned = document.getElementById('tab-returned');
        const btnBorrowed = document.getElementById('btn-borrowed');
        const btnReturned = document.getElementById('btn-returned');

        tabBorrowed.classList.remove('active');
        tabReturned.classList.remove('active');

        if (tab === 'borrowed') {
            tabBorrowed.classList.add('active');
        } else {
            tabReturned.classList.add('active');
        }

        btnBorrowed.classList.remove('active', 'borrowed');
        btnReturned.classList.remove('active', 'returned');

        if (tab === 'borrowed') {
            btnBorrowed.classList.add('active', 'borrowed');
        } else {
            btnReturned.classList.add('active', 'returned');
        }

        wrapper.classList.remove('body-borrowed', 'body-returned');
        wrapper.classList.add(tab === 'borrowed' ? 'body-borrowed' : 'body-returned');
    }

</script>
@endsection