<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Marquee;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        return view('profil', compact('profil'));
    }
}
