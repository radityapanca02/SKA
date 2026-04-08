<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::latest()->paginate(6);
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'graduation' => 'required|max:50',
            'position' => 'required|max:100',
            'company' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp',
            'bg_color' => 'required|max:50',
            'achievements' => 'nullable',
        ]);

        $imagePath = 'default.svg';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('alumni', 'public');
        }

        // Process achievements from textarea
        $achievements = [];
        if ($request->achievements) {
            $achievements = array_filter(
                array_map('trim', explode("\n", $request->achievements))
            );
        }

        Alumni::create([
            'name' => $request->name,
            'graduation' => $request->graduation,
            'position' => $request->position,
            'company' => $request->company,
            'description' => $request->description,
            'image' => $imagePath,
            'bg_color' => $request->bg_color,
            'achievements' => !empty($achievements) ? $achievements : null,
        ]);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan!');
    }

    public function show(Alumni $alumnus)
    {
        // Jika perlu detail page
    }

    public function edit(Alumni $alumnus)
    {
        return view('admin.alumni.edit', compact('alumnus'));
    }

    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'name' => 'required|max:100',
            'graduation' => 'required|max:50',
            'position' => 'required|max:100',
            'company' => 'required|max:100',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp',
            'bg_color' => 'required|max:50',
            'achievements' => 'nullable',
        ]);

        $imagePath = $alumnus->image;

        if ($request->hasFile('image')) {
            if ($alumnus->image && $alumnus->image !== 'default.svg') {
                Storage::disk('public')->delete($alumnus->image);
            }
            $imagePath = $request->file('image')->store('alumni', 'public');
        }

        // Process achievements from textarea
        $achievements = [];
        if ($request->achievements) {
            $achievements = array_filter(
                array_map('trim', explode("\n", $request->achievements))
            );
        }

        $alumnus->update([
            'name' => $request->name,
            'graduation' => $request->graduation,
            'position' => $request->position,
            'company' => $request->company,
            'description' => $request->description,
            'image' => $imagePath,
            'bg_color' => $request->bg_color,
            'achievements' => !empty($achievements) ? $achievements : null,
        ]);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil diperbarui!');
    }

    public function destroy(Alumni $alumnus)
    {
        if ($alumnus->image && $alumnus->image !== 'default.svg') {
            Storage::disk('public')->delete($alumnus->image);
        }

        $alumnus->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil dihapus!');
    }
}
