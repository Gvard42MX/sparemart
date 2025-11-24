<?php

namespace App\Http\Controllers;

use App\Models\MenuWarkop;
use Illuminate\Http\Request;

class MenuWarkopController extends Controller
{
    public function index()
    {
        $menus = MenuWarkop::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'nama_minuman' => 'required|string|max:255',
            'gambar' => 'image|nullable',
            'harga_makanan' => 'required|integer',
            'harga_minuman' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $validated['total_harga'] = $validated['harga_makanan'] + $validated['harga_minuman'];

        MenuWarkop::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(MenuWarkop $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, MenuWarkop $menu)
    {
        $validated = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'nama_minuman' => 'required|string|max:255',
            'gambar' => 'image|nullable',
            'harga_makanan' => 'required|integer',
            'harga_minuman' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $validated['total_harga'] = $validated['harga_makanan'] + $validated['harga_minuman'];

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy(MenuWarkop $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
