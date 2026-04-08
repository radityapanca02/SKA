<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('admin.assets.index', compact('assets'));
    }

    public function create()
    {
        $folders = ['alumni', 'berita', 'kegiatan', 'ssb', 'ssb_section1', 'prestasi'];
        return view('admin.assets.create', compact('folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'folder' => 'required|string'
        ]);

        $folder = $request->folder;
        $destinationPath = public_path("assets/{$folder}");

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        Asset::create([
            'folder' => $folder,
            'image' => $filename,
        ]);

        return redirect()->route('admin.assets.index')->with('success', 'Asset berhasil diupload!');
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        return view('admin.assets.edit', compact('asset'));
    }

    public function update(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);

        $request->validate([
            'folder' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $folder = $request->folder;
        $destinationPath = public_path("assets/{$folder}");

        // pastikan folder ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        if ($request->hasFile('image')) {
            $oldFile = public_path("assets/{$asset->folder}/{$asset->image}");
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $asset->update([
                'folder' => $folder,
                'image' => $filename,
            ]);
        } else {
            if ($asset->folder !== $folder) {
                $oldPath = public_path("assets/{$asset->folder}/{$asset->image}");
                $newPath = public_path("assets/{$folder}/{$asset->image}");

                if (!file_exists(public_path("assets/{$folder}"))) {
                    mkdir(public_path("assets/{$folder}"), 0777, true);
                }

                rename($oldPath, $newPath);
            }

            $asset->update([
                'folder' => $folder,
            ]);
        }

        return redirect()->route('admin.assets.index')->with('success', 'Asset berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $filePath = public_path($asset->path);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $asset->delete();

        return redirect()->route('admin.assets.index')->with('success', 'Asset berhasil dihapus.');
    }
}
