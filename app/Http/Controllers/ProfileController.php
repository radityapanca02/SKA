<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $kepsek = Content::where('folder', 'kepsek')->latest()->get();
        $alumnis = Content::where('folder', 'alumni')->latest()->get();
        return view('profile.index', compact('alumnis', 'kepsek'));
    }
}