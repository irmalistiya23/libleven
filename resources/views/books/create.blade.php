@extends('master')
@section('konten')
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col">
                <h2>Tambah Buku Baru</h2>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('manage-buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="kode_buku" class="form-label">Kode Buku</label>
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ old('kode_buku') }}" required>
                </div>

                    <div class="mb-3">
                        <label for="NamaBuku" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="NamaBuku" name="NamaBuku" 
                               value="{{ old('NamaBuku') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" 
                               value="{{ old('penulis') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" 
                               value="{{ old('penerbit') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" 
                                  rows="4" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <div class="row">
                            @foreach($kategoris as $kategori)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="kategoris[]" value="{{ $kategori->id }}" 
                                               id="kategori{{ $kategori->id }}"
                                               {{ in_array($kategori->id, old('kategoris', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="kategori{{ $kategori->id }}">
                                            {{ $kategori->NamaKategori }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="CoverBuku" class="form-label">Sampul Buku</label>
                        <input type="file" class="form-control" id="CoverBuku" name="CoverBuku" 
                               accept="image/jpeg,image/png,image/jpg" required>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img src="" alt="Preview" style="max-height: 200px;">
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('manage-buku') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preview gambar sebelum upload
        document.getElementById('CoverBuku').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.querySelector('img').src = e.target.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
@endsection