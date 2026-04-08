<?php
// app/Http\Controllers\Admin\MarqueeController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;
use Illuminate\Support\Facades\Storage;

class MarqueeController extends Controller
{
    public function index()
    {
        $marquees = Marquee::orderBy('urutan')->orderBy('nama')->paginate(10);
        return view('admin.marquee.index', compact('marquees'));
    }

    public function create()
    {
        return view('admin.marquee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $gambarPath = $request->file('gambar')->store('marquee', 'public');

        Marquee::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.marquee.index')->with('success', 'Logo marquee berhasil ditambahkan!');
    }

    public function edit(Marquee $marquee)
    {
        return view('admin.marquee.edit', compact('marquee'));
    }

    public function update(Request $request, Marquee $marquee)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $data = [
            'nama' => $request->nama,
            'urutan' => $request->urutan ?? 0,
        ];

        if ($request->hasFile('gambar')) {
            if ($marquee->gambar) {
                Storage::disk('public')->delete($marquee->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('marquee', 'public');
        }

        $marquee->update($data);

        return redirect()->route('admin.marquee.index')->with('success', 'Logo marquee berhasil diperbarui!');
    }

    public function destroy(Marquee $marquee)
    {
        if ($marquee->gambar) {
            Storage::disk('public')->delete($marquee->gambar);
        }

        $marquee->delete();

        return redirect()->route('admin.marquee.index')->with('success', 'Logo marquee berhasil dihapus!');
    }
}
