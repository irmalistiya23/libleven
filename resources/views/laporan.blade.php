@extends('master')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 
<div class="card-header text-dark">
    <h3 class="card-title">Daftar Laporan</h3>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($laporans->isEmpty())
    <div class="alert alert-info">Belum ada laporan yang masuk.</div>
@else
    <table class="table datatable">
        <thead class="text-center">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            <tr>
                <td>{{ $laporan->nama }}</td>
                <td>{{ $laporan->email }}</td>
                <td>{{ $laporan->subjek }}</td>
                <td>{{ $laporan->pesan }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="confirmDelete('{{ route('laporan.destroy', $laporan->id) }}', '{{ $laporan->nama }}')">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <p>Apakah Anda yakin ingin menghapus <strong class="text-primary" id="deleteUserName"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    function confirmDelete(url, name) {
        document.getElementById('deleteUserName').textContent = name;
        document.getElementById('deleteForm').action = url;
        deleteModal.show();
    }

    $(document).ready(function () {
        $('.datatable').DataTable();
    });
</script>

@endsection
