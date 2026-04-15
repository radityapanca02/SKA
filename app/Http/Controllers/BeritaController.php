<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type', 'all');
        $query = Berita::query();

        if ($type !== 'all') {
            $query->where('type', $type);
        }

        $beritas = $query->latest()->paginate(9)->withQueryString();

        return view('berita', compact('beritas', 'type'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        // Increment views
        $berita->increment('views');

        $beritaTerbaru = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('detail-berita', compact('berita', 'beritaTerbaru'));
    }
}
