@extends('master')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/kategoribuku.css') }}">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<h2 class="mb-4">Manage Kategori</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Tombol untuk menampilkan modal tambah kategori -->
<button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
    Tambah Kategori
</button>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="NamaKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="NamaKategori" name="NamaKategori" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabel Kategori -->
<table class="table table-striped datatable">
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $kategori->NamaKategori }}</td>
            <td>
                <button type="button" 
                    class="btn btn-danger btn-sm" 
                    onclick="confirmDelete('{{ route('kategori.destroy', $kategori->id) }}', '{{ $kategori->NamaKategori }}')">
                    Hapus
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus kategori <strong class="text-primary" id="deleteKategoriName">?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function () {
        $('.datatable').DataTable();
    });

    // Modal Hapus
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    function confirmDelete(url, kategoriName) {
        document.getElementById('deleteKategoriName').textContent = kategoriName;
        document.getElementById('deleteForm').action = url;
        deleteModal.show();
    }
</script>
@endsection
