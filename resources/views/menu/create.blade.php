@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    
    <h2 class="text-2xl font-bold text-red-600 mb-6">Tambah Menu Baru</h2>

    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium mb-1">Nama Makanan</label>
                <input type="text" name="nama_makanan" 
                       class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500"
                       required>
            </div>

            <div>
                <label class="block font-medium mb-1">Nama Minuman</label>
                <input type="text" name="nama_minuman" 
                       class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500"
                       required>
            </div>

            <div>
                <label class="block font-medium mb-1">Harga Makanan</label>
                <input type="number" name="harga_makanan" 
                       class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500"
                       required>
            </div>

            <div>
                <label class="block font-medium mb-1">Harga Minuman</label>
                <input type="number" name="harga_minuman" 
                       class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500"
                       required>
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar Menu</label>
            <input type="file" name="gambar" 
                   class="w-full border rounded-md px-3 py-2 bg-white focus:ring-2 focus:ring-red-500">
        </div>

        <button type="submit"
                class="w-full bg-red-600 text-white py-2 rounded-md font-semibold hover:bg-red-700 transition">
            Simpan Menu
        </button>

    </form>
</div>
@endsection
