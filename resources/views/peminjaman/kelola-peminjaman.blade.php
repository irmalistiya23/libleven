@extends('master')
@section('konten')
<link rel="stylesheet" href="{{ asset('assets/css/peminjaman.css')}}">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="container">
    <h1 class="judul-peminjaman mb-4">Kelola Peminjaman</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle datatable">
            <thead class="table-header">
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->foto_url }}" alt="User Avatar" class="user-avatar">
                        </td>
                        <td>{{ $user->nis }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>
                            <a href="{{ route('form-peminjaman', $user->id) }}" class="btn btn-success btn-pinjam">
                                <i class="bi bi-box-arrow-in-down"></i> Pinjam
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center data-kosong">
                            <i class="bi bi-emoji-frown kosong-icon"></i>
                            <div class="kosong-text">Nama atau NIS tidak ditemukan.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>

        $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

@endsection
