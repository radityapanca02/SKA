<?php
// app/Http/Controllers/Admin/JurusanController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->paginate(6);
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|max:100',
            'departemen' => 'required|in:OTOMOTIF,TIK,ELEKTRO,PEMESINAN',
            'deskripsi' => 'required|max:500',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
        ]);

        $gambarPath = 'default.svg';
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('jurusan', 'public');
        }

        Jurusan::create([
            'jurusan' => $request->jurusan,
            'departemen' => $request->departemen,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function show(Jurusan $jurusan)
    {
        // Jika perlu detail page
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'jurusan' => 'required|max:100',
            'departemen' => 'required|in:OTOMOTIF,TIK,ELEKTRO,PEMESINAN',
            'deskripsi' => 'required|max:500',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
        ]);

        $gambarPath = $jurusan->gambar;

        if ($request->hasFile('gambar')) {
            if ($jurusan->gambar && $jurusan->gambar !== 'default.svg') {
                Storage::disk('public')->delete($jurusan->gambar);
            }
            $gambarPath = $request->file('gambar')->store('jurusan', 'public');
        }

        $jurusan->update([
            'jurusan' => $request->jurusan,
            'departemen' => $request->departemen,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui!');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar && $jurusan->gambar !== 'default.svg') {
            Storage::disk('public')->delete($jurusan->gambar);
        }

        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus!');
    }
}
