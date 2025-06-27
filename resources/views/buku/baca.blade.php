@extends('master')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/baca.css') }}">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Header + Dropdown Pilih Bab (judul fix center) --}}
            <div class="position-relative mb-4">

                {{-- Tombol Kembali --}}
                <a href="{{ url()->previous() }}" class="btn buttonarrow">
                    ←
                </a>

                {{-- Judul Buku --}}
                <h2 class="text-dark text-center m-0">
                    {{ $buku->NamaBuku }}
                </h2>

                {{-- Dropdown Pilih Bab --}}
                <div class="position-absolute end-0 top-50 translate-middle-y" style="min-width: 160px;">
                    <select id="pilihBab" class="form-select">
                        @foreach($babList as $index => $bab)
                            <option value="{{ $index }}">Bab {{ $index + 1 }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Carousel Konten Bab --}}
            <div id="carouselBab" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">
                    @foreach($babList as $index => $bab)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="card shadow-sm rounded-4">
                                <div class="card-body p-4">
                                    <p class="text-dark text-justify" style="line-height: 1.8; font-size: 1.1rem;">
                                        {!! nl2br(e(trim($bab))) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script dropdown ke slide --}}
<script>
    document.getElementById('pilihBab').addEventListener('change', function () {
        let selectedIndex = parseInt(this.value);
        let carousel = bootstrap.Carousel.getInstance(document.getElementById('carouselBab')) 
                        || new bootstrap.Carousel(document.getElementById('carouselBab'));
        carousel.to(selectedIndex);
    });
</script>
@endsection
