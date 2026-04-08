<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekskul;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::latest()->paginate(9);
        return view('admin.ekstrakurikuler.index', compact('ekskuls'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $imagePath = 'default.svg';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ekskul', 'public');
        }

        Ekskul::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function show(Ekskul $ekskul)
    {
        // Jika perlu detail page
    }

    public function edit(Ekskul $ekskul)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, Ekskul $ekskul)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $imagePath = $ekskul->image;

        if ($request->hasFile('image')) {
            if ($ekskul->image && $ekskul->image !== 'default.svg') {
                Storage::disk('public')->delete($ekskul->image);
            }
            $imagePath = $request->file('image')->store('ekskul', 'public');
        }

        $ekskul->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    public function destroy(Ekskul $ekskul)
    {
        if ($ekskul->image && $ekskul->image !== 'default.svg') {
            Storage::disk('public')->delete($ekskul->image);
        }

        $ekskul->delete();

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
