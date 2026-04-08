<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(6);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|max:100',
            'deskripsi' => 'required|max:175',
            'content'   => 'required',
            'type'      => 'required|in:PRESTASI,KEGIATAN,PENGUMUMAN,ACARA',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $gambarPath = 'default.svg';
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'title'     => $request->title,
            'deskripsi' => $request->deskripsi,
            'content'   => $request->content,
            'type'      => $request->type,
            'gambar'    => $gambarPath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $beritum) // route-model binding name is singular by resource config - keep consistent
    {
        // If you need, show detail page; not used in admin list usually.
        // return view('admin.berita.show', ['berita' => $beritum]);
    }

    public function edit($id)
{
    $berita = Berita::findOrFail($id);
    return view('admin.berita.edit', compact('berita'));
}

public function update(Request $request, $id)
{
    $berita = Berita::findOrFail($id);

    $request->validate([
        'title'     => 'required|max:100',
        'deskripsi' => 'required|max:175',
        'content'   => 'required',
        'type'      => 'required|in:PRESTASI,KEGIATAN,PENGUMUMAN,ACARA',
        'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,svg,webp',
    ]);

    $gambarPath = $berita->gambar;

    if ($request->hasFile('gambar')) {
        if ($berita->gambar && $berita->gambar !== 'default.svg') {
            Storage::disk('public')->delete($berita->gambar);
        }
        $gambarPath = $request->file('gambar')->store('berita', 'public');
    }

    $berita->update([
        'title'     => $request->title,
        'deskripsi' => $request->deskripsi,
        'content'   => $request->content,
        'type'      => $request->type,
        'gambar'    => $gambarPath,
    ]);

    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
}

    public function destroy($id)
    {
        try {
            // Cari berita berdasarkan ID
            $berita = Berita::findOrFail($id);

            // Simpan data untuk log sebelum dihapus
            $beritaTitle = $berita->title;

            // Hapus gambar jika bukan default
            if ($berita->gambar && $berita->gambar !== 'default.svg') {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Hapus berita
            $berita->delete();

            // Log activity
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'DELETE',
                'model_type' => Berita::class,
                'model_id' => $id,
                'description' => "Deleted berita: {$beritaTitle}",
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            return redirect()->route('admin.berita.index')
                           ->with('success', 'Berita berhasil dihapus!');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.berita.index')
                           ->with('error', 'Berita tidak ditemukan!');

        } catch (\Exception $e) {
            ActivityLog::error('Error deleting berita: ' . $e->getMessage());
            return redirect()->route('admin.berita.index')
                           ->with('error', 'Terjadi kesalahan saat menghapus berita!');
        }
    }
}
