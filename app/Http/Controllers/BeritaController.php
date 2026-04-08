<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Content::where('folder', 'berita')
            ->orderBy('created_at', 'ASC')
            ->get();

        // bagi per section
        $section1 = $berita->slice(0, 3);
        $section2 = $berita->slice(3, 3);
        $section3 = $berita->slice(6, 100);

        return view('informasi.berita', compact('section1', 'section2', 'section3', 'berita'));
    }

    public function show($id)
    {
        $berita = Content::findOrFail($id);

        // max 4 berita lain untuk sidebar
        $beritaLain = Content::where('folder', 'berita')
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('informasi.berita_lengkap1', compact('berita', 'beritaLain'));
    }
}