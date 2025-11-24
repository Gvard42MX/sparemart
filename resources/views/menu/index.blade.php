@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-red-50 to-amber-50 px-6 py-10">

    <div class="max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="text-center mb-12">
            <div class="inline-block bg-white rounded-full p-4 shadow-xl mb-4 animate-bounce-slow">
                <span class="text-6xl">🍽️</span>
            </div>
            <h1 class="text-5xl font-black text-red-700 mb-3">
                Menu Warung Nayamul
            </h1>
            <p class="text-orange-600 text-lg font-medium">
                Pilihan makanan & minuman enak dengan harga terjangkau
            </p>

            {{-- TOMBOL TAMBAH (Admin Only) --}}
            @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="mt-6">
                <a href="{{ route('menu.create') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:from-red-700 hover:to-red-800 transition-all duration-300 hover:scale-105">
                    <span class="text-2xl">+</span>
                    <span>Tambah Menu Baru</span>
                </a>
            </div>
            @endif
        </div>

        {{-- GRID MENU --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($menus as $menu)
            <div class="group bg-white rounded-2xl shadow-xl overflow-hidden border-4 border-orange-200 hover:border-red-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                
                {{-- GAMBAR --}}
                <div class="relative h-48 w-full bg-gradient-to-br from-orange-100 to-red-100 overflow-hidden">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/'.$menu->gambar) }}" 
                             alt="{{ $menu->nama_makanan }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                            <span class="text-6xl mb-2">🍜</span>
                            <span class="font-semibold">No Image</span>
                        </div>
                    @endif
                    
                    {{-- BADGE HOT --}}
                    <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg flex items-center gap-1">
                        <span>🔥</span>
                        <span>HOT</span>
                    </div>
                </div>

                {{-- CONTENT --}}
                <div class="p-5">
                    {{-- NAMA MAKANAN --}}
                    <h3 class="text-xl font-black text-gray-800 mb-2 line-clamp-2">
                        {{ $menu->nama_makanan }}
                    </h3>

                    {{-- NAMA MINUMAN --}}
                    <div class="flex items-center gap-2 text-orange-600 mb-4">
                        <span class="text-lg">🥤</span>
                        <p class="text-sm font-semibold">{{ $menu->nama_minuman }}</p>
                    </div>

                    {{-- HARGA DETAIL --}}
                    <div class="bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl p-4 mb-4 space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600 font-medium">🍛 Makanan</span>
                            <span class="text-base font-bold text-gray-800">
                                Rp {{ number_format($menu->harga_makanan, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600 font-medium">🥤 Minuman</span>
                            <span class="text-base font-bold text-gray-800">
                                Rp {{ number_format($menu->harga_minuman, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    {{-- TOTAL HARGA --}}
                    <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-xl p-4 mb-4 shadow-lg">
                        <div class="flex justify-between items-center">
                            <span class="text-white font-bold text-sm">TOTAL HARGA</span>
                            <span class="text-yellow-300 font-black text-xl">
                                Rp {{ number_format($menu->total_harga, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    {{-- TOMBOL AKSI (Admin Only) --}}
                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="flex gap-2">
                        <a href="{{ route('menu.edit', $menu->id) }}" 
                           class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-bold shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin ingin hapus menu ini?')"
                              class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-bold shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            {{-- EMPTY STATE --}}
            <div class="col-span-full">
                <div class="bg-white rounded-2xl shadow-xl border-4 border-orange-200 p-16 text-center">
                    <span class="text-9xl block mb-6">🍽️</span>
                    <h3 class="text-3xl font-black text-gray-700 mb-3">Belum Ada Menu</h3>
                    <p class="text-gray-500 text-lg mb-6">Tambahkan menu pertama untuk warung Anda</p>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('menu.create') }}" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        <span class="text-2xl">+</span>
                        <span>Tambah Menu Sekarang</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforelse
        </div>

        {{-- INFO FOOTER --}}
        <div class="mt-16 text-center">
            <div class="inline-block bg-white rounded-2xl shadow-xl border-4 border-amber-200 px-8 py-6">
                <p class="text-gray-700 font-semibold text-lg mb-2">
                    🌟 <span class="text-red-600">Pesan sekarang</span> dan nikmati kelezatan warung kami!
                </p>
                <p class="text-gray-500 text-sm">
                    Harga terjangkau • Rasa rumahan • Porsi pas
                </p>
            </div>
        </div>

    </div>

</div>

<style>
@keyframes bounce-slow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-bounce-slow {
    animation: bounce-slow 2s ease-in-out infinite;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection