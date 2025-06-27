@extends('master')
@section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/buku.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>MindSpark</title>
</head>
<body>
<div class="container mt-4">

    <div class="row">
        <div class="col-md-5">
            <div class="book-cover-container">
                <form action="{{ route('favorites.toggle', ['action' => auth()->user()->favorites->contains('BukuID', $buku->id) ? 'remove' : 'add', 'bukuId' => $buku->id]) }}" method="POST" class="favorite-btn">
                    @csrf
                    <button type="submit" class="btn border-0 bg-transparent">
                        <i class="bi bi-star{{ auth()->user()->favorites->contains('BukuID', $buku->id) ? '-fill' : '' }} fs-3 text-warning" aria-hidden="true"></i>
                    </button>
                </form>

                @if($buku->CoverBuku)
                    <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" alt="{{ $buku->NamaBuku }}" class="img-fluid">
                @else
                    <div class="no-image p-5 bg-light text-center rounded">Gambar tidak tersedia</div>
                @endif
            </div>
        </div>

        <div class="col-md-7">
            <div class="book-details">
                <h1>{{ $buku->NamaBuku }}</h1>
                <p class="author mb-2"><strong>{{ $buku->penulis }}</strong></p>
                <div class="categories mb-3">
                    @foreach($buku->kategoris as $kategori)
                        <span class="badge bg-primary me-1">{{ $kategori->NamaKategori }}</span>
                    @endforeach
                </div>
                <p class="publisher mb-2">{{ $buku->deskripsi }}</p><br>
                <form action="{{ route('buku.baca', $buku->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-baca">Baca</button>
</form>

                <br><br>
                <h4>Penilaian</h4>
                <div class="book-rating mb-3">
                    @php
                        $rating = $buku->average_rating;
                        $fullStars = floor($rating);
                        $halfStar = $rating - $fullStars >= 0.5;
                    @endphp
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $fullStars)
                            <i class="fas fa-star text-warning"></i>
                        @elseif($i == $fullStars + 1 && $halfStar)
                            <i class="fas fa-star-half-alt text-warning"></i>
                        @else
                            <i class="far fa-star text-warning"></i>
                        @endif
                    @endfor
                    <span class="rating-text ms-2 fw-bold">
                        {{ number_format($rating, 1) }} / 5.0
                        <span class="text-muted">({{ $buku->reviews_count }} reviews)</span>
                    </span>
                </div>

                <div class="reviews mt-5">
                    <button type="button" class="btn btn-allreviews" data-bs-toggle="modal" data-bs-target="#lihatUlasanModal">
                        Lihat Semua Ulasan
                    </button>

                    <!-- Modal Lihat Ulasan -->
                    <div class="modal fade" id="lihatUlasanModal" tabindex="-1" aria-labelledby="lihatUlasanLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-between">
                                    <ul class="nav nav-tabs" id="reviewTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active btn-allreviews" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Ulasan</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn-allreviews" id="addReview-tab" data-bs-toggle="tab" href="#addReview" role="tab" aria-controls="addReview" aria-selected="false">Beri Ulasan</a>
                                        </li>
                                    </ul>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="tab-content" id="reviewTabContent">
                                        <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                            @if($buku->ulasans->count() > 0)
                                                @foreach($buku->ulasans as $ulasan)
                                                    <div class="review-item mb-4 border-bottom pb-3">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex">
                                                                <img src="{{ $ulasan->user->foto_url ?? asset('default-avatar.png') }}" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                                                                <div>
                                                                    <strong>{{ $ulasan->user->nama }}</strong>
                                                                    <div class="rating mb-1">
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <i class="{{ $i <= $ulasan->Rating ? 'fas' : 'far' }} fa-star text-warning"></i>
                                                                        @endfor
                                                                    </div>
                                                                    <div class="review-content">{{ $ulasan->Ulasan }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                @if(auth()->id() === $ulasan->user->id)
                                                                    <button class="btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#editReviewModal{{ $ulasan->id }}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm text-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                <small class="text-muted">{{ $ulasan->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted">Belum ada ulasan untuk buku ini.</p>
                                            @endif
                                        </div>

                                        <div class="tab-pane fade" id="addReview" role="tabpanel" aria-labelledby="addReview-tab">
                                            <form action="{{ route('ulasan.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                                <div class="mb-3">
                                                    <h5>Bintang:</h5>
                                                    @for($i = 5; $i >= 1; $i--)
                                                        <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" required>
                                                        <label for="star{{$i}}" class="star-label"><i class="fas fa-star"></i></label>
                                                    @endfor
                                                </div>
                                                <div class="mb-3">
                                                    <h5 for="review">Komentar:</h5>
                                                    <textarea class="form-control" name="ulasan" rows="3" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-allreviews">Kirim Penilaian</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Edit Penilaian -->
                @foreach($buku->ulasans as $ulasan)
                    <div class="modal fade" id="editReviewModal{{ $ulasan->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Penilaian</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Bintang:</label>
                                            @for($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="editStar{{ $ulasan->id }}_{{ $i }}" name="rating" value="{{ $i }}" {{ $ulasan->Rating == $i ? 'checked' : '' }} required>
                                                <label for="editStar{{ $ulasan->id }}_{{ $i }}" class="star-label"><i class="fas fa-star"></i></label>
                                            @endfor
                                        </div>
                                        <div class="mb-3">
                                            <label for="ulasan{{ $ulasan->id }}">Komentar:</label>
                                            <textarea class="form-control" name="ulasan" rows="3" required>{{ $ulasan->Ulasan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach


    <!-- Buku Lainnya -->
    <h3 class="mt-5">Buku Lainnya</h3>
    <div class="row mt-3">
        @foreach($otherBooks as $buku)
            <div class="col-6 col-md-3 mb-4">
                <div class="other-book-item">
                    <div class="other-book-cover-container">
                        <a href="{{ route('buku.show', $buku->id) }}">
                            <img src="{{ asset('storage/cover_buku/' . $buku->CoverBuku) }}" 
                                alt="{{ $buku->NamaBuku }}" 
                                class="img-fluid rounded shadow">
                        </a>
                    </div>
                    <div class="book-info">
                        <h5 class="book-title">{{ $buku->NamaBuku }}</h5>
                        <p class="book-author">{{ $buku->penulis }}</p>
                        <p class="book-category">
                            @foreach($buku->kategoris as $kategori)
                                <span class="badge bg-primary">{{ $kategori->NamaKategori }}</span>
                            @endforeach
                        </p> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        // Jika buku belum dipinjam, tambahkan event listener pada form
        const borrowForm = document.getElementById('borrowForm');
        if(borrowForm){
            borrowForm.addEventListener('submit', function(e){
                e.preventDefault();
                fetch(borrowForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        borrowButton.textContent = 'Dipinjam';
                        borrowButton.classList.remove('btn-success');
                        borrowButton.classList.add('btn-secondary');
                        borrowButton.disabled = true;
                    } else {
                        alert(data.message || 'An error occurred');
                    }
                });
            });
        }
    });
</script>
</html>
@endsection

