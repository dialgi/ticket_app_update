<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Lokasi;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $categories = Kategori::all();
        $lokasis = Lokasi::all();
        return view('admin.event.create', compact('categories', 'lokasis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_waktu' => 'required|date',
            'lokasi' => 'required|string', // UBAH: dari lokasi_id menjadi lokasi (string)
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images/events'), $imageName);
            $validatedData['gambar'] = $imageName;
        }

        $validatedData['user_id'] = auth()->id() ?? null;
        
        // Simpan ke database (Sekarang kuncinya sudah 'lokasi' sesuai kolom DB)
        Event::create($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $event = Event::with(['tikets', 'kategori'])->findOrFail($id);
        
        $categories = Kategori::all();
        $tickets = $event->tikets;
        
        return view('admin.event.show', compact('event', 'categories', 'tickets'));
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Kategori::all();
        $lokasis = Lokasi::all();
        return view('admin.event.edit', compact('event', 'categories', 'lokasis'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $event = Event::findOrFail($id);
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tanggal_waktu' => 'required|date',
                'lokasi' => 'required|string', // UBAH: dari lokasi_id menjadi lokasi
                'kategori_id' => 'required|exists:kategoris,id',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                $imageName = time().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('images/events'), $imageName);
                $validatedData['gambar'] = $imageName;
            }

            $event->update($validatedData);
            return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}