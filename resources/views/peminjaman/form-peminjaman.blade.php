@extends('master')
@section('konten')
<link rel="stylesheet" href="{{ asset('assets/css/peminjaman.css')}}">


<div class="container py-4">
    <form action="{{ route('simpan-peminjaman') }}" method="POST">
        @csrf
    <h2>Informasi Peminjam</h2>
    <input type="hidden" name="UserID" value="{{ $user->id }}">
    <input type="hidden" name="BukuID" id="BukuID">
    
    <div class="row mb-4">
        <div class="col-md-6">
            <label>NIS atau NIP:</label>
            <input type="text" class="form-control" value="{{ $user->nis }}" readonly>
        </div>
        <div class="col-md-6">
            <label>Nama:</label>
            <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
        </div>
    </div>

    <div class="card p-4 mb-4" style="background-color: #d3d3d3; border-radius: 15px;">
        <h5>Informasi Buku:</h5>
        <div id="informasi-buku">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalBuku">
                Tambah Buku
              </button>
    
          <!-- Buku yang dipilih akan muncul di sini -->
        </div>
          <!-- Modal Buku -->
        <div class="modal fade" id="modalBuku" tabindex="-1" aria-labelledby="modalBukuLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Pilih Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                <input type="text" id="searchBuku" class="form-control mb-3" placeholder="Cari buku...">
        
                <div id="listBuku" class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Buku akan dimuat di sini -->
                </div>
                </div>
            </div>
            </div>
        </div>
        
          
        <div id="list-buku">
            <!-- Buku ditambahkan di sini -->
        </div>
    </div>

    <h4>Peminjaman</h4>
        <div class="row mb-4">
            <div class="col-md-5">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="col-md-1 d-flex align-items-center justify-content-center">
                s.d
            </div>

            <div class="col-md-5">
                <label>Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="form-control" required>
            </div>
        </div>

         {{-- <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan Buku</button>
                    </div> --}}
        <div class="text-center">
                                    <a href="{{ route('kelola-peminjaman') }}" class="btn btn-secondary me-2">Batal</a>

            <button class="btn btn-warning" type="submit">Selesai</button>
        </div>
    </form>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const listBuku = document.getElementById('listBuku'); // tempat daftar buku dalam modal
    const searchInput = document.getElementById('searchBuku');
    const bukuDipilihContainer = document.getElementById('list-buku'); // tempat daftar buku yang dipilih (di bawah tombol Tambah Buku)

    function fetchBuku(search = '') {
        fetch(`/ajax/buku?search=${encodeURIComponent(search)}`)
            .then(res => res.json())
            .then(data => {
                listBuku.innerHTML = '';
                data.forEach(buku => {
                    const col = document.createElement('div');
                    col.classList.add('col');
                    const ketersediaan = buku.ketersediaan;
                    const badgeClass = ketersediaan === 'Tersedia' ? 'success' : 'danger';



                    col.innerHTML = `
                        <div class="card h-100">
                            <img src="/storage/cover_buku/${buku.CoverBuku}" class="card-img-top" alt="${buku.NamaBuku}">
                            <div class="card-body">
                                <h5 class="card-title">${buku.NamaBuku}</h5>
                                <p class="card-text"><small>${buku.penulis}</small></p>
                                <p class="card-text"><span class="badge bg-${badgeClass}">${ketersediaan}</span></p>
                                    <button type="button" class="btn btn-primary btn-sm btnPilihBuku" data-id="${buku.id}" data-nama="${buku.NamaBuku}">Pilih</button>
                            </div>
                        </div>
                    `;
                    listBuku.appendChild(col);
                });
            });
    }

    searchInput.addEventListener('input', () => {
        fetchBuku(searchInput.value);
    });

    fetchBuku(); // load awal

    // Function to load selected books from localStorage
    function loadSelectedBooks() {
        const selectedBooks = JSON.parse(localStorage.getItem('selectedBooks')) || [];
        selectedBooks.forEach(buku => {
            const bukuItem = document.createElement('div');
            bukuItem.classList.add('d-flex', 'align-items-center', 'mb-2');
            bukuItem.id = `buku-${buku.id}`;

            bukuItem.innerHTML = `
                <strong class="me-2">📚 ${buku.nama}</strong>
                <input type="hidden" name="buku_id[]" value="${buku.id}">
                <button type="button" class="btn btn-danger btn-sm btnHapusBuku">Hapus</button>
            `;

            bukuDipilihContainer.appendChild(bukuItem);
        });
    }

    // Call to load selected books when the page loads
    loadSelectedBooks();

    // Handle clicking "Pilih" button
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('btnPilihBuku')) {
            const id = e.target.dataset.id;
            const nama = e.target.dataset.nama;

 // Ambil elemen parent (card) untuk akses badge ketersediaan
        const card = e.target.closest('.card');
        const statusText = card.querySelector('.badge').textContent.trim();

        if (statusText === 'Tidak Tersedia') {
            alert('Buku ini tidak tersedia');
            return; // stop proses
        }

        // Cek apakah buku sudah dipilih sebelumnya
        if (document.getElementById(`buku-${id}`)) {
            alert('Buku ini sudah dipilih!');
            return;
        }

        // Container untuk satu buku
        const bukuItem = document.createElement('div');
        bukuItem.classList.add('d-flex', 'align-items-center', 'mb-2');
        bukuItem.id = `buku-${id}`;

        bukuItem.innerHTML = `
            <span class="me-2">📚 ${nama}</span>
            <input type="hidden" name="buku_id[]" value="${id}">
            <button type="button" class="btn btn-danger btn-sm btnHapusBuku">Hapus</button>
        `;

        bukuDipilihContainer.appendChild(bukuItem);

        // Save the selected book to localStorage
        const selectedBooks = JSON.parse(localStorage.getItem('selectedBooks')) || [];
        selectedBooks.push({ id, nama });
        localStorage.setItem('selectedBooks', JSON.stringify(selectedBooks));

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalBuku'));
        modal.hide();
    }
});

    // Handle removing selected book
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('btnHapusBuku')) {
            const item = e.target.parentElement;
            const id = item.id.split('-')[1]; // Get book id from the element's id

            // Remove the book from localStorage
            let selectedBooks = JSON.parse(localStorage.getItem('selectedBooks')) || [];
            selectedBooks = selectedBooks.filter(buku => buku.id !== id);
            localStorage.setItem('selectedBooks', JSON.stringify(selectedBooks));

            item.remove();
        }
    });

    document.querySelector('form').addEventListener('submit', function (e) {
    const bukuIds = JSON.parse(localStorage.getItem('selectedBooks')).map(buku => buku.id);
    const bukuInputs = document.querySelectorAll('input[name="buku_id[]"]');
    const selectedBooks = JSON.parse(localStorage.getItem('selectedBooks')) || [];

    if (selectedBooks.length === 0) {
        e.preventDefault();
        alert("Silakan pilih minimal 1 buku sebelum menyelesaikan peminjaman.");
        return;
    }

    // Remove all previous buku_id inputs
    bukuInputs.forEach(input => input.remove());

    // Add new buku_id inputs from localStorage
    bukuIds.forEach(id => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'buku_id[]';
        input.value = id;
        this.appendChild(input);
    });
    localStorage.removeItem('selectedBooks');
});


    // Set tanggal hari ini default untuk tanggal_pinjam
    const today = new Date();
    const tanggalPinjamInput = document.getElementById('tanggal_pinjam');
    const tanggalJatuhTempoInput = document.getElementById('tanggal_jatuh_tempo');

    const formatDate = (date) => {
        let d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }

    tanggalPinjamInput.value = formatDate(today);

function tambahHariKerja(tanggalMulai, jumlahHariKerja) {
    let hasil = new Date(tanggalMulai);
    let hariKerjaDitambahkan = 0;

    while (hariKerjaDitambahkan < jumlahHariKerja) {
        hasil.setDate(hasil.getDate() + 1);
        const hari = hasil.getDay(); // 0 = Minggu, 6 = Sabtu
        if (hari !== 0 && hari !== 6) {
            hariKerjaDitambahkan++;
        }
    }

    return hasil;
}

const jatuhTempo = tambahHariKerja(today, 3); // 3 hari kerja dari hari ini
tanggalJatuhTempoInput.value = formatDate(jatuhTempo);

});

</script>

@endsection
