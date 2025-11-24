@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Tambah Catatan Keuangan</h4>
            <a href="{{ route('Keuangan.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('Keuangan.store') }}" method="POST" id="keuanganForm">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Penjualan harian" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pemasukan (Rp)</label>
                        <input type="number" name="pemasukan" id="pemasukan" class="form-control" value="0" step="0.01">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pengeluaran (Rp)</label>
                        <input type="number" name="pengeluaran" id="pengeluaran" class="form-control" value="0" step="0.01">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Keuntungan (Otomatis)</label>
                    <input type="text" id="keuntungan" class="form-control bg-light fw-bold" readonly>
                </div>

                <button class="btn btn-success w-100 py-2">Simpan Catatan</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('keuanganForm').addEventListener('input', function() {
    let pemasukan = parseFloat(document.getElementById('pemasukan').value) || 0;
    let pengeluaran = parseFloat(document.getElementById('pengeluaran').value) || 0;
    let total = pemasukan - pengeluaran;
    document.getElementById('keuntungan').value = total.toLocaleString('id-ID');
});
</script>
@endsection
