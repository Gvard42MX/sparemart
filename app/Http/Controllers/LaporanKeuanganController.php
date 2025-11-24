<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $laporans = Keuangan::orderBy('tanggal', 'desc')->get();

        // Hitung total harian (berdasarkan tanggal)
        $totalHarian = $laporans->groupBy('tanggal')->map(function ($item) {
            $pemasukan = $item->sum('pemasukan');
            $pengeluaran = $item->sum('pengeluaran');
            return [
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'keuntungan' => $pemasukan - $pengeluaran,
            ];
        });

        return view('Keuangan.index', compact('laporans', 'totalHarian'));
    }

    public function create()
    {
        return view('Keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
        ]);

        Keuangan::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'pemasukan' => $request->pemasukan ?? 0,
            'pengeluaran' => $request->pengeluaran ?? 0,
        ]);

        return redirect()->route('Keuangan.index')->with('success', 'Data keuangan berhasil disimpan.');
    }

    public function edit($id)
    {
        $laporan = Keuangan::findOrFail($id);
        return view('Keuangan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Keuangan::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
        ]);

        $laporan->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'pemasukan' => $request->pemasukan ?? 0,
            'pengeluaran' => $request->pengeluaran ?? 0,
        ]);

        return redirect()->route('Keuangan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Keuangan::findOrFail($id)->delete();
        return redirect()->route('Keuangan.index')->with('success', 'Data berhasil dihapus.');
    }
}
