@extends('navbar')

@section('konten')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 10px;">
        <h3 class="text-center mb-4">Masuk</h3>
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn buttonlogin w-100">Masuk</button>
        </form>
    </div>
</div>
@endsection
