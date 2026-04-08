<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Alumni;
use App\Models\Prestasi;
use App\Models\Ekskul;
use App\Models\Pendaftaran;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Visitor;

class VisitorController extends Controller
{
    /**
     * Display dashboard with statistics
     */
    public function dashboard()
    {
        $stats = [
            'berita' => Berita::count(),
            'alumni' => Alumni::count(),
            'prestasi' => Prestasi::count(),
            'ekskul' => Ekskul::count(),
            'pendaftaran' => Pendaftaran::count(),
            'logs' => ActivityLog::count(),
            'users' => User::count(),
        ];

        // Ambil recent logs dengan eager loading yang aman
        $recentLogs = ActivityLog::with('user')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentLogs'));
    }

    /**
     * API endpoint untuk data pengunjung (digunakan oleh chart)
     */
    // Di VisitorController.php - ganti method getVisitorData()
public function getVisitorData()
{
    try {
        // 🔴 FIX: Gunakan method baru yang hitung visitor UNIK
        $totalVisitors = Visitor::getTotalUniqueVisitors();
        $activeVisitors = Visitor::getActiveVisitorsCount();
        $todayVisitors = Visitor::getTodayVisitorsCount();

        // Data 7 hari terakhir (tetap pakai total records untuk chart)
        $weeklyVisitors = [];
        $startDate = now()->subDays(6)->startOfDay();

        $dailyCounts = Visitor::where('visited_at', '>=', $startDate)
            ->selectRaw('DATE(visited_at) as date, COUNT(DISTINCT visitor_id) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $count = $dailyCounts[$date] ?? 0;

            $weeklyVisitors[] = [
                'date'  => $date,
                'total' => $count,
            ];
        }

        return response()->json([
            'success'        => true,
            'totalVisitors'  => $totalVisitors,
            'activeVisitors' => $activeVisitors, // 🔴 SEKARANG AKAN BERUBAH REAL-TIME
            'todayVisitors'  => $todayVisitors,
            'weeklyVisitors' => $weeklyVisitors,
            'last_updated'   => now()->toISOString(),
            'server_time'    => now()->format('H:i:s')
        ]);

    } catch (\Exception $e) {
        Log::error('Error fetching visitor data: ' . $e->getMessage());

        return response()->json([
            'success'        => false,
            'error'          => $e->getMessage(),
            'totalVisitors'  => 0,
            'activeVisitors' => 0,
            'todayVisitors'  => 0,
            'weeklyVisitors' => [],
        ], 500);
    }
}

    /**
     * Fallback data jika database error
     */
    private function getFallbackWeeklyData()
    {
        $weeklyData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date         = now()->subDays($i);
            $weeklyData[] = [
                'date'  => $date->format('Y-m-d'),
                'total' => rand(10, 50), // Random data untuk demo
            ];
        }
        return $weeklyData;
    }
}
