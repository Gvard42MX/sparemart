@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-red-50 to-amber-50 px-6 py-10">

    <div class="max-w-7xl mx-auto">

        {{-- HEADER WARUNG STYLE --}}
        <div class="text-center mb-10">
            <div class="inline-block bg-white rounded-full p-4 shadow-lg mb-4">
               <img src="{{ asset('icon/dish.gif') }}"
                     class="w-20 h-20 object-cover rounded-xl "
                     alt="Logo">
            </div>
            <h1 class="text-4xl font-black text-red-700 mb-2">
                Laporan Keuangan Warung
            </h1>
            <p class="text-orange-600 text-lg font-medium">
                Pantau untung rugi warung dengan mudah
            </p>
        </div>

        {{-- STATS CARDS SIMPLE --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            {{-- Total Pemasukan --}}
            <div class="bg-white border-4 border-green-500 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="text-center">
                    <span class="text-5xl mb-3 block">💰</span>
                    <p class="text-green-600 font-bold text-sm uppercase mb-2">Total Pemasukan</p>
                    <h3 class="text-3xl font-black text-gray-800">
                        Rp {{ number_format($laporans->sum('pemasukan'), 0, ',', '.') }}
                    </h3>
                </div>
            </div>

            {{-- Total Pengeluaran --}}
            <div class="bg-white border-4 border-red-500 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="text-center">
                    <span class="text-5xl mb-3 block">💸</span>
                    <p class="text-red-600 font-bold text-sm uppercase mb-2">Total Pengeluaran</p>
                    <h3 class="text-3xl font-black text-gray-800">
                        Rp {{ number_format($laporans->sum('pengeluaran'), 0, ',', '.') }}
                    </h3>
                </div>
            </div>

            {{-- Keuntungan Bersih --}}
            <div class="bg-gradient-to-br from-amber-400 to-orange-500 border-4 border-amber-600 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="text-center">
                    <span class="text-5xl mb-3 block">🏆</span>
                    <p class="text-white font-bold text-sm uppercase mb-2">Keuntungan Bersih</p>
                    <h3 class="text-3xl font-black text-white">
                        Rp {{ number_format($laporans->sum('pemasukan') - $laporans->sum('pengeluaran'), 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('Keuangan.create') }}"
               class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:scale-105 flex items-center gap-3">
                <span class="text-2xl">+</span>
                <span>Tambah Catatan Baru</span>
            </a>
        </div>

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg mb-6 shadow-lg flex items-center gap-3">
                <span class="text-3xl">✓</span>
                <span class="font-bold text-lg">{{ session('success') }}</span>
            </div>
        @endif

        {{-- TABLE UTAMA --}}
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-4 border-red-600 mb-10">
            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-5">
                <h3 class="text-white font-black text-2xl flex items-center gap-3">
                    <span class="text-3xl">📋</span>
                    Daftar Catatan Keuangan
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-red-700 text-white">
                            <th class="py-4 px-6 text-left font-bold text-base">No</th>
                            <th class="py-4 px-6 text-left font-bold text-base">Tanggal</th>
                            <th class="py-4 px-6 text-left font-bold text-base">Keterangan</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Pemasukan</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Pengeluaran</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Saldo</th>
                            <th class="py-4 px-6 text-center font-bold text-base">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($laporans as $laporan)
                        <tr class="border-b border-gray-200 hover:bg-orange-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-800 font-bold text-lg">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6 text-gray-700 font-medium">{{ $laporan->tanggal }}</td>
                            <td class="py-4 px-6 text-gray-700">{{ $laporan->keterangan }}</td>

                            <td class="py-4 px-6 text-right">
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-bold inline-block">
                                    Rp {{ number_format($laporan->pemasukan, 0, ',', '.') }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-right">
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-bold inline-block">
                                    Rp {{ number_format($laporan->pengeluaran, 0, ',', '.') }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-right">
                                <span class="bg-amber-100 text-amber-800 px-4 py-2 rounded-lg font-black text-lg inline-block">
                                    Rp {{ number_format($laporan->saldo, 0, ',', '.') }}
                                </span>
                            </td>

                            <td class="py-4 px-6">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('Keuangan.edit', $laporan->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg font-bold shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('Keuangan.destroy', $laporan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin hapus catatan ini?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg font-bold shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <span class="text-8xl">📝</span>
                                    <p class="text-gray-500 text-xl font-semibold">Belum ada catatan keuangan</p>
                                    <a href="{{ route('Keuangan.create') }}" 
                                       class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-lg font-bold hover:scale-105 transition-transform shadow-lg">
                                        Buat Catatan Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- RINGKASAN HARIAN --}}
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-4 border-orange-500">
            <div class="bg-gradient-to-r from-orange-500 to-amber-600 px-6 py-5">
                <h3 class="text-white font-black text-2xl flex items-center gap-3">
                    <span class="text-3xl">📊</span>
                    Ringkasan Keuntungan Harian
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-orange-600 text-white">
                            <th class="py-4 px-6 text-left font-bold text-base">Tanggal</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Total Pemasukan</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Total Pengeluaran</th>
                            <th class="py-4 px-6 text-right font-bold text-base">Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalHarian as $tanggal => $data)
                        <tr class="border-b border-gray-200 hover:bg-orange-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-800 font-bold text-lg">{{ $tanggal }}</td>

                            <td class="py-4 px-6 text-right">
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-bold inline-block">
                                    Rp {{ number_format($data['pemasukan'], 0, ',', '.') }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-right">
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-bold inline-block">
                                    Rp {{ number_format($data['pengeluaran'], 0, ',', '.') }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-right">
                                @if($data['keuntungan'] >= 0)
                                    <span class="bg-green-500 text-white px-5 py-2 rounded-lg font-black text-lg inline-block shadow-lg">
                                        ✅ Rp {{ number_format($data['keuntungan'], 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="bg-red-500 text-white px-5 py-2 rounded-lg font-black text-lg inline-block shadow-lg">
                                        ❌ Rp {{ number_format($data['keuntungan'], 0, ',', '.') }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection