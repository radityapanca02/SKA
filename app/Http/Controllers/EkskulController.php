<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;

class EkskulController extends Controller
{
    public function index(Request $request) {
    $ekskuls = Ekskul::latest()->paginate(6);

    if ($request->ajax() || $request->has('ajax')) {
            return view('ekskul', compact('ekskuls'));
        }

        return view('ekskul', compact('ekskuls'));
    }
}
