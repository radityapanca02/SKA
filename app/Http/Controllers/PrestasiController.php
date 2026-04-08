<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index(Request $request) {
        $prestasis = Prestasi::latest()->paginate(6);
        $totalPrestasi = Prestasi::latest()->count();

        if ($request->ajax()) {
            return view('prestasi', compact('prestasis', 'totalPrestasi'));
        }

        return view('prestasi', compact('prestasis', 'totalPrestasi'));
    }
}
