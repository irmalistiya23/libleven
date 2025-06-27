@extends('master')
@section('konten')
<style>
    body {
    padding-top: 80px; 

    .btn-button {
        background-color: #8de3ff;
        color: black;
    }

    .btn-button:hover{
        background-color: #ffc107;
        color: black;
    }
}

</style>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 550px; border-radius: 10px;">
        <h3 class="text-center mb-4">Daftar</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS/NIP</label>
                <input type="text" class="form-control" name="nis" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-button w-100">Daftar</button>
        </form>
    </div>
</div>
@endsection
