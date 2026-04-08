<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'all');

        $query = Berita::query();

        if ($type !== 'all') {
            $query->where('type', $type);
        }

        $beritas = $query->latest()->paginate(9)->withQueryString();

        // Jika request AJAX, kembalikan JSON
        if ($request->ajax() || $request->has('ajax')) {
            return response()->json([
                'beritas'    => $beritas->map(function ($berita) {
                    return [
                        'gambar_url' => $berita->gambar_url,
                        'title'      => $berita->title,
                        'type'       => $berita->type,
                        'created_at' => $berita->created_at->format('d M Y'),
                        'views'      => $berita->views,
                        'deskripsi'  => $berita->deskripsi,
                        'slug'       => $berita->slug,
                    ];
                }),
                'pagination' => [
                    'current_page'  => $beritas->currentPage(),
                    'last_page'     => $beritas->lastPage(),
                    'next_page_url' => $beritas->nextPageUrl(),
                    'prev_page_url' => $beritas->previousPageUrl(),
                    'total'         => $beritas->total(),
                ],
            ]);
        }

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
