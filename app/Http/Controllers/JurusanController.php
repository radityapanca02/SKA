<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\JurusanStatistik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all()->map(function ($jurusan) {
            $jurusan->jurusan = html_entity_decode($jurusan->jurusan);
            return $jurusan;
        });
        return view('jurusan', compact('jurusans'));
    }

    public function incrementStats(Request $request)
{
    Log::info('=== JURUSAN INCREMENT STATS CALLED ===');
    Log::info('IP: ' . $request->ip());
    Log::info('User Agent: ' . $request->userAgent());
    Log::info('Request Data: ', $request->all());
    Log::info('Headers: ', $request->headers->all());
    Log::info('Session ID: ' . session()->getId());
    Log::info('CSRF Token: ' . csrf_token());
    Log::info('=====================================');

    // Validasi sederhana dulu
    $departemen = $request->departemen;
    $type = $request->type;

    if (!in_array($departemen, ['elektro', 'otomotif', 'pemesinan', 'tik'])) {
        Log::error('Invalid departemen: ' . $departemen);
        return response()->json(['success' => false, 'message' => 'Invalid departemen'], 400);
    }

    if (!in_array($type, ['click', 'view'])) {
        Log::error('Invalid type: ' . $type);
        return response()->json(['success' => false, 'message' => 'Invalid type'], 400);
    }

    try {
        $today = now()->format('Y-m-d');

        Log::info("Processing: {$departemen}, {$type}, {$today}");

        $existing = DB::table('jurusan_statistiks')
            ->where('tanggal', $today)
            ->where('departemen', $departemen)
            ->where('type', $type)
            ->first();

        if ($existing) {
            DB::table('jurusan_statistiks')
                ->where('id', $existing->id)
                ->update(['jumlah' => $existing->jumlah + 1]);
            $newCount = $existing->jumlah + 1;
            Log::info("Updated existing: {$newCount}");
        } else {
            DB::table('jurusan_statistiks')->insert([
                'tanggal' => $today,
                'departemen' => $departemen,
                'type' => $type,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $newCount = 1;
            Log::info("Created new: {$newCount}");
        }

        Log::info("✅ Successfully saved to database");

        return response()->json([
            'success' => true,
            'message' => 'Statistik berhasil diupdate',
            'data' => [
                'departemen' => $departemen,
                'type' => $type,
                'count' => $newCount,
                'saved_to' => 'database'
            ]
        ]);

    } catch (\Exception $e) {
        Log::error('❌ Database error: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());

        return response()->json([
            'success' => false,
            'message' => 'Gagal menyimpan statistik: ' . $e->getMessage()
        ], 500);
    }
}

    public function getStats(Request $request)
    {
        try {
            $stats = DB::table('jurusan_statistiks')
                ->where('type', 'click')
                ->select('departemen', DB::raw('SUM(jumlah) as total'))
                ->groupBy('departemen')
                ->get()
                ->pluck('total', 'departemen')
                ->toArray();

            // Pastikan semua departemen ada
            $defaultStats = [
                'elektro' => 0,
                'otomotif' => 0,
                'pemesinan' => 0,
                'tik' => 0
            ];

            $mergedStats = array_merge($defaultStats, $stats);

            return response()->json([
                'success' => true,
                'data' => $mergedStats
            ]);

        } catch (\Exception $e) {
            Log::error('Error getStats: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil statistik'
            ], 500);
        }
    }
}
