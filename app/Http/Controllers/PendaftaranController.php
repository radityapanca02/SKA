<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class PendaftaranController extends Controller
{
    public function index()
    {
        $ssb = Content::where('folder', 'ssb')->latest()->paginate(3);
        $ssb2 = Content::where('folder', 'ssb')->latest()->paginate(3);
        return view('informasi.SSB', compact('ssb', 'ssb2'));
    }
}
