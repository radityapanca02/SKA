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
        // Ambil data profil pertama
        $profil = Profil::first();

        // Jika tidak ada data profil, redirect atau handle error
        if (!$profil) {
            abort(404, 'Profil tidak ditemukan');
        }

        return view('profil', compact('profil'));
    }
}
