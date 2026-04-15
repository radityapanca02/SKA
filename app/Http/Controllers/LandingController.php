<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class LandingController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(4)->get();
        return view('landing', compact('beritas'));
    }
}
