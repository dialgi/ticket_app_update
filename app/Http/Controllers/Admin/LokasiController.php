<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index() {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasis'));
    }

    public function create() {
        return view('admin.lokasi.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lokasi' => 'required|max:255'
        ]);
        
        // Menggunakan field spesifik lebih aman daripada all()
        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi
        ]);
        
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil ditambah');
    }

    public function edit(Lokasi $lokasi) {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi) {
        $request->validate([
            'nama_lokasi' => 'required|max:255'
        ]);
        
        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi
        ]);
        
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diupdate');
    }

    public function destroy(Lokasi $lokasi) {
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil dihapus');
    }
}