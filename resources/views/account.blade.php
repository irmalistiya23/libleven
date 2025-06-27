@extends('master')
@section('konten')

<link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">

<div class="account-container">
    <div class="account-card">
        <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="avatar-container">

                <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/img/avatar.png') }}" alt="User Avatar" class="avatar" id="preview-avatar">
            </div>
            <div class="avatar-container">
                <label for="foto" class="edit-photo">
                    <i class="bi bi-camera"></i> Ganti Foto
                </label>
                <input type="file" id="foto" name="foto" hidden>
            </div>
            <div class="form-row">
                <div class="form-group">

                    <label for="nis">NIS/NIP</label>
                    <input type="text" id="nis" name="nis" value="{{ Auth::user()->nis }}" disabled>
                    <i class="bi bi-person-badge"></i>

                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ Auth::user()->nama }}" disabled>
                    <i class="bi bi-person"></i>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ Auth::user()->alamat }}" disabled>
                    <i class="bi bi-geo-alt"></i>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                    <i class="bi bi-envelope"></i>
                </div>
            </div>

            <button type="submit" class="save-btn">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
    document.querySelector('.edit-photo').addEventListener('click', function () {
        document.getElementById('foto').click();
    });

    document.getElementById('foto').addEventListener('change', function () {
    let file = this.files[0];
    console.log(file); // Cek apakah file terdeteksi
    if (file) {
        document.getElementById('preview-avatar').src = URL.createObjectURL(file);
    }
});

</script>



@endsection
