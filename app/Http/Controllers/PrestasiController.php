<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class PrestasiController extends Controller
{
    public function index()
    {
        $itemsPerPage = 2;
        
        $allPrestasi = Content::whereIn('folder', ['prestasi', 'prestasi2'])
            ->latest()
            ->get();
        
        $totalItems = $allPrestasi->count();
        $totalPages = ceil($totalItems / $itemsPerPage);
        
        return view('informasi.prestasi', compact('allPrestasi', 'totalPages', 'itemsPerPage'));
    }
}