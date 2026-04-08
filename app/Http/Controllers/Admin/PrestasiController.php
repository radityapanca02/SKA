<?php
// app/Http/Controllers/Admin/PrestasiController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(6);
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'subjudul' => 'required|max:100',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $gambarPath = 'default.svg';
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create([
            'nama' => $request->nama,
            'subjudul' => $request->subjudul,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function show(Prestasi $prestasi)
    {
        // Jika perlu detail page
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'subjudul' => 'required|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $gambarPath = $prestasi->gambar;

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar && $prestasi->gambar !== 'default.svg') {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $gambarPath = $request->file('gambar')->store('prestasi', 'public');
        }

        $prestasi->update([
            'nama' => $request->nama,
            'subjudul' => $request->subjudul,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar && $prestasi->gambar !== 'default.svg') {
            Storage::disk('public')->delete($prestasi->gambar);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}
