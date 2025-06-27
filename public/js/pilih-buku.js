document.addEventListener('DOMContentLoaded', function () {
    fetchBuku();

    document.addEventListener('click', function (e) {
        // Tambah buku
        if (e.target.classList.contains('btnPilihBuku')) {
            const id = e.target.dataset.id;
            const nama = e.target.dataset.nama;
            const cover = e.target.dataset.cover;
            const kode = e.target.dataset.kode;
            const stok = parseInt(e.target.dataset.stok);

            if (document.getElementById('bukuItem-' + id)) {
                alert("Buku sudah dipilih!");
                return;
            }

            const bukuItem = document.createElement('div');
            bukuItem.classList.add('mb-3');
            bukuItem.id = 'bukuItem-' + id;
            bukuItem.innerHTML = `
                <div class="card w-100 p-2">
                    <div class="d-flex align-items-center">
                        <img src="/storage/covers/${cover}" alt="${nama}" width="60" class="me-3 border">
                        <div class="flex-grow-1">
                            <div><strong>${nama}</strong></div>
                            <div>Kode: ${kode}</div>
                            <div class="d-flex align-items-center mt-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm btnKurang me-1" data-id="${id}" data-stok="${stok}">-</button>
                                <input type="number" readonly class="form-control form-control-sm text-center jumlahInput" value="1" style="width: 60px;" name="jumlah_buku[${id}]">
                                <button type="button" class="btn btn-outline-secondary btn-sm btnTambah ms-1" data-id="${id}" data-stok="${stok}">+</button>
                                <span class="ms-2 text-muted small stokSisa" id="stok-msg-${id}">Stok: ${stok}</span>
                            </div>
                            <input type="hidden" name="buku_id[]" value="${id}">
                        </div>
                        <button type="button" class="btn btn-danger btn-sm ms-3 btnHapusBuku">Hapus</button>
                    </div>
                </div>
            `;
            document.getElementById('bukuTerpilih').appendChild(bukuItem);
        }

        // Hapus buku
        if (e.target.classList.contains('btnHapusBuku')) {
            e.target.closest('.mb-3').remove();
        }

        // Tambah jumlah
        if (e.target.classList.contains('btnTambah')) {
            const id = e.target.dataset.id;
            const stok = parseInt(e.target.dataset.stok);
            const input = e.target.parentElement.querySelector('.jumlahInput');
            let jumlah = parseInt(input.value);
            if (jumlah < stok) {
                input.value = ++jumlah;
            } else {
                document.getElementById(`stok-msg-${id}`).innerText = "Anda sudah mencapai stok maksimal";
            }
        }

        // Kurangi jumlah
        if (e.target.classList.contains('btnKurang')) {
            const id = e.target.dataset.id;
            const stok = parseInt(e.target.dataset.stok);
            const input = e.target.parentElement.querySelector('.jumlahInput');
            let jumlah = parseInt(input.value);
            if (jumlah > 1) {
                input.value = --jumlah;
                document.getElementById(`stok-msg-${id}`).innerText = `Stok: ${stok}`;
            }
        }
    });

    function fetchBuku() {
        fetch('/api/bukus')
            .then(res => res.json())
            .then(data => {
                const daftar = document.getElementById('daftarBuku');
                daftar.innerHTML = '';
                data.forEach(buku => {
                    const col = document.createElement('div');
                    col.classList.add('col-md-4');
                    col.innerHTML = `
                        <div class="card h-100">
                            <img src="/storage/covers/${buku.CoverBuku}" class="card-img-top" alt="${buku.NamaBuku}">
                            <div class="card-body">
                                <h6 class="card-title">${buku.NamaBuku}</h6>
                                <p class="card-text small">Kode: ${buku.kode_buku}</p>
                                <p class="card-text small">Stok: ${buku.stok}</p>
                                <button class="btn btn-success btn-sm btnPilihBuku" 
                                    data-id="${buku.id}" 
                                    data-nama="${buku.NamaBuku}" 
                                    data-kode="${buku.kode_buku}"
                                    data-cover="${buku.CoverBuku}" 
                                    data-stok="${buku.stok}">
                                    Pilih
                                </button>
                            </div>
                        </div>
                    `;
                    daftar.appendChild(col);
                });
            });
    }
});
