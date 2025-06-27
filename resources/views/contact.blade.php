@extends('navbar')

@section('konten')
    <!-- Section Kontak -->
    <section id="contact" class="contact section light-background">

        <!-- Judul Section -->
        <div class="container section-title" data-aos="fade-up">
          {{-- <h2>Kontak</h2>
          <p>Butuh bantuan atau ada pertanyaan? Silakan hubungi kami.</p> --}}
        </div><!-- End Section Title -->
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
              <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                <h3>Informasi Kontak</h3>
                <p>Punya pertanyaan atau butuh bantuan? Jangan ragu untuk menghubungi kami!</p>
  
                <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div class="content">
                    <h4>Lokasi Perpustakaan</h4>
                    <p>SMKN 11 Bandung</p>
                    <p>Jl. Budhi Cilember, Sukaraja, Cicendo, Kota Bandung, Jawa Barat 40153, Indonesia</p>
                  </div>
                </div>
  
                <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="content">
                    <h4>Nomor Telepon</h4>
                    <p>+1 5589 55488 55</p>
                    <p>+1 6678 254445 41</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="content">
                    <h4>Jam Operasional</h4>
                    <p>Senin - Jumat: 07.00 – 15.00 WIB</p>
                    <p>Sabtu – Minggu: Tutup</p>
                  </div>
                </div>
  
                <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="content">
                    <h4>Alamat Email</h4>
                    <p>LibLeveninfo@gmail.com</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-7">
              <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                <h3>Hubungi Kami</h3>
                <p>Silakan isi formulir di bawah ini untuk menghubungi kami. Tim kami akan segera merespons pertanyaan Anda.</p>
  
                @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif

                <form action="{{ route('laporan.store') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                @csrf
    <div class="row gy-4">

        <div class="col-md-6">
          <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
        </div>

        <div class="col-md-6 ">
          <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
        </div>

        <div class="col-12">
          <input type="text" class="form-control" name="subjek" placeholder="Subjek" required>
        </div>

        <div class="col-12">
          <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required></textarea>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="btn buttonchat">Kirim Pesan</button>
        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section><!-- /Section Kontak -->
@endsection