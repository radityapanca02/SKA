<?php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    // ✅ Untuk halaman utama pendaftaran (chart + tabel)
    public function index()
    {
        // Ambil semua data dari database
        $pendaftarans = Pendaftaran::orderBy('tahun', 'desc')
            ->take(5)
            ->get()
            ->sortBy('tahun');

        // Siapkan data untuk chart
        $chartData = [
            'labels'    => $pendaftarans->pluck('tahun'),
            'pendaftar' => $pendaftarans->pluck('jumlah_pendaftar'),
            'diterima'  => $pendaftarans->pluck('jumlah_diterima'),
        ];

        // Kirim ke view
        return view('pendaftaran', compact('pendaftarans', 'chartData'));
    }

    // ✅ Untuk data API chart (dipakai oleh fetch di JS)
    public function getChartData()
    {
        $data = Pendaftaran::orderBy('tahun', 'desc')
            ->take(5)
            ->get()
            ->sortBy('tahun');

        return response()->json([
            'labels'    => $data->pluck('tahun'),
            'pendaftar' => $data->pluck('jumlah_pendaftar'),
            'diterima'  => $data->pluck('jumlah_diterima'),
        ]);
    }
}
