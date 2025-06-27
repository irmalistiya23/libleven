@extends('master')
@section('konten')

<link rel="stylesheet" href="{{ asset('assets/css/peminjaman.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<div class="container mt-4">
    <h3 class="mb-4">Kelola Pengembalian</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FILTER --}}
    <div class="row g-2 mb-4">
        <div class="col-md-2">
            <select id="filterStatus" class="form-select">
                <option value="">Semua Status</option>
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
                <option value="terlambat">Terlambat</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle datatable">
            <thead class="table-dark">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Waktu Pinjam</th>
                    <th>Buku Dipinjam</th>
                    <th>Buku Dikembalikan</th>
                    <th>Status Keseluruhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->user->nis ?? '-' }}</td>
                    <td>{{ $peminjaman->user->nama ?? '-' }}</td>
                    <td>
                        @php
                            $jatuhTempo = \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo);
                            $terlambat = now()->gt($jatuhTempo);
                        @endphp
                        <p>
                            Pinjam: {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}<br>
                            Jatuh Tempo: {{ $jatuhTempo->format('d M Y') }}
                        </p>
                        @if ($terlambat)
                            <span class="badge bg-danger">Terlambat</span>
                        @endif
                    </td>

                    <td>
                        <ul class="mb-0">
                            @forelse($peminjaman->bukus->whereNull('pivot.tanggal_kembali') as $buku)
                                <li>{{ $buku->kode_buku }} - {{ $buku->NamaBuku }}</li>
                            @empty
                                <li><em>Tidak ada</em></li>
                            @endforelse
                        </ul>
                    </td>

                    <td>
                        <ul class="mb-0">
                            @forelse($peminjaman->bukus->whereNotNull('pivot.tanggal_kembali') as $buku)
                                <li>
                                    {{ $buku->kode_buku }} - {{ $buku->NamaBuku }}<br>
                                    <small class="text-muted">Kembali: {{ \Carbon\Carbon::parse($buku->pivot->tanggal_kembali)->format('d M Y') }}</small><br>
                                    <small class="text-danger">Denda: Rp{{ number_format($buku->pivot->denda, 0, ',', '.') }}</small>
                                </li>
                            @empty
                                <li><em>Belum ada</em></li>
                            @endforelse
                        </ul>
                    </td>

                    <td>
                        @php
                            $totalBuku = $peminjaman->bukus->count();
                            $bukuKembali = $peminjaman->bukus->whereNotNull('pivot.tanggal_kembali')->count();
                        @endphp
                        <span class="badge bg-{{ $totalBuku == $bukuKembali ? 'success' : 'warning' }}">
                            {{ $totalBuku == $bukuKembali ? 'dikembalikan' : 'dipinjam' }}
                        </span>
                    </td>

                    <td>
                        <button class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalPengembalian-{{ $peminjaman->id }}">
                            Ganti Status
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL DIPISAHKAN DARI TABEL --}}
@foreach ($peminjamans as $peminjaman)
<div class="modal fade" id="modalPengembalian-{{ $peminjaman->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengembalian.store', $peminjaman->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Pengembalian Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>NIS</label>
                        <input type="text" class="form-control" value="{{ $peminjaman->user->nis }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $peminjaman->user->nama }}" readonly>
                    </div>

                    <label class="form-label">Pilih Buku yang Dikembalikan</label>
                    @foreach ($peminjaman->bukus as $buku)
                        @if (!$buku->pivot->tanggal_kembali)
                            <div class="form-check mb-2">
                                <input class="form-check-input buku-checkbox" type="checkbox" name="buku_ids[]" value="{{ $buku->id }}"
                                    data-buku-id="{{ $buku->id }}" data-jatuh-tempo="{{ $peminjaman->tanggal_jatuh_tempo }}">
                                <label class="form-check-label">
                                    {{ $buku->kode_buku }} - {{ $buku->NamaBuku }}
                                </label>
                                <div class="denda-wrapper mt-1" style="display: none;">
                                    <label class="form-label small">Denda (Rp)</label>
                                    <input type="number" name="denda[{{ $buku->id }}]" class="form-control form-control-sm denda-input" value="0">
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="mb-3 tanggal-kembali-wrapper" style="display: none;">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
function hitungHariKerja(startDate, endDate) {
    let count = 0;
    const current = new Date(startDate);
    while (current <= endDate) {
        const day = current.getDay();
        if (day !== 0 && day !== 6) count++;
        current.setDate(current.getDate() + 1);
    }
    return count;
}

document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('[id^="modalPengembalian-"]');
    modals.forEach(modal => {
        const tanggalInput = modal.querySelector('input[name="tanggal_kembali"]');
        const checkboxes = modal.querySelectorAll('.buku-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const wrapper = this.closest('.form-check').querySelector('.denda-wrapper');
                wrapper.style.display = this.checked ? 'block' : 'none';
                updateTanggalKembaliVisibility(modal);
            });
        });

        function updateTanggalKembaliVisibility(modal) {
            const isChecked = Array.from(checkboxes).some(cb => cb.checked);
            const tanggalWrapper = modal.querySelector('.tanggal-kembali-wrapper');
            tanggalWrapper.style.display = isChecked ? 'block' : 'none';
        }

        tanggalInput?.addEventListener('change', function () {
            const tanggalKembali = new Date(this.value);
            checkboxes.forEach(checkbox => {
                if (!checkbox.checked) return;
                const jatuhTempo = new Date(checkbox.dataset.jatuhTempo);
                let denda = 0;
                if (tanggalKembali > jatuhTempo) {
                    const startDate = new Date(jatuhTempo);
                    startDate.setDate(startDate.getDate() + 1);
                    const hariTerlambat = hitungHariKerja(startDate, tanggalKembali);
                    denda = hariTerlambat * 1000;
                }
                const bukuId = checkbox.dataset.bukuId;
                const inputDenda = modal.querySelector(`input[name="denda[${bukuId}]"]`);
                if (inputDenda) inputDenda.value = denda;
            });
        });

        updateTanggalKembaliVisibility(modal);
    });

    // DataTable & Filter
    const table = $('.datatable').DataTable({ order: [[0, 'desc']] });
    $('#filterStatus').on('change', function () {
        table.column(2).search('');
        table.column(5).search('');
        const val = $(this).val();
        if (val === '') {
            table.draw();
        } else if (val === 'terlambat') {
            table.column(2).search('Terlambat', true, false).draw();
        } else {
            table.column(5).search(val, true, false).draw();
        }
    });
});
</script>

@endsection
