@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Laporan Keuangan</h1>

    <form action="{{ route('Keuangan.update', $laporan->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $laporan->tanggal }}" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Keterangan</label>
            <input type="text" name="keterangan" value="{{ $laporan->keterangan }}" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Jumlah</label>
            <input type="number" name="jumlah" value="{{ $laporan->jumlah }}" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-semibold">Tipe</label>
            <select name="tipe" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="masuk" {{ $laporan->tipe == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $laporan->tipe == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('Keuangan.index') }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Perbarui</button>
        </div>
    </form>
</div>
@endsection
