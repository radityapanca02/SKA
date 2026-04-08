<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class KegiatanController extends Controller
{
    public function index()
    {
        $contents = Content::where('folder', 'kegiatan')
            ->latest()
            ->get();

        if ($contents->isEmpty()) {
            return view('informasi.kegiatan', [
                'slides' => collect(),
                'gallerySections' => collect(),
                'empty' => true,
            ]);
        }

        $slides = $contents->take(3);
        $gallerySections = $contents->skip(3)->chunk(4);

        return view('informasi.kegiatan', [
            'slides' => $slides,
            'gallerySections' => $gallerySections,
            'empty' => false,
        ]);
    }
}
