<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
use App\Models\AdminLog;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $query = Content::orderBy('created_at', 'desc');
    
        if ($request->has('category') && $request->category != '') {
            $query->where('folder', $request->category);
        }
    
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%');
        });
    }
    
    $contents = $query->paginate(10);
    
    return view('admin.contents.index', compact('contents'));
}

    public function create()
    {
        return view('admin.contents.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'folder' => 'required|string',
        'image' => 'required',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp'
    ]);

    $images = [];

    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/' . $request->folder), $filename);
            $images[] = $filename;
        }
    }

    Content::create([
        'title' => $request->title,
        'body' => $request->body,
        'folder' => $request->folder,
        'image' => json_encode($images),
    ]);

    // ✅ Perbaikan: gunakan auth()->user()
    $user = auth()->user();

    AdminLog::create([
        'admin_name' => $user->name ?? $user->username,
        'activity' => 'Menambahkan Konten',
    ]);

    return redirect()->route('admin.contents.index')->with('success', 'Konten berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $user = auth()->user(); // ✅ Tambahkan baris ini

    AdminLog::create([
        'admin_name' => $user->name ?? $user->username,
        'activity' => 'Mengupdate Konten',
    ]);

    $content = Content::findOrFail($id);

    $data = $request->validate([
        'title' => 'required|string',
        'body' => 'nullable|string',
        'credit' => 'nullable|string',
        'folder' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    if ($request->folder === 'ssb' && $request->hasFile('images')) {
        $images = [];
        foreach ($request->file('images') as $file) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/ssb'), $name);
            $images[] = $name;
        }
        $data['image'] = json_encode($images);
    } elseif ($request->hasFile('image')) {
        $file = $request->file('image');
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/' . $request->folder), $name);
        $data['image'] = $name;
    }

    $content->update($data);
    return redirect()->route('admin.contents.index')->with('success', 'Konten berhasil diperbarui.');
}

public function destroy($id)
{
    $user = auth()->user(); // ✅ Tambahkan baris ini

    AdminLog::create([
        'admin_name' => $user->name ?? $user->username,
        'activity' => 'Menghapus Konten',
    ]);

    $content = Content::findOrFail($id);

    // Jika gambar disimpan dalam array JSON
    if ($content->image) {
        $images = json_decode($content->image, true);
        if (is_array($images)) {
            foreach ($images as $image) {
                $path = public_path("assets/{$content->folder}/{$image}");
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        } else {
            $path = public_path("assets/{$content->folder}/{$content->image}");
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    $content->delete();

    return back()->with('success', 'Konten berhasil dihapus!');
}
public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.contents.edit', compact('content'));
    }
}

