<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;
use App\Models\Content;
use App\Models\Visitor;
use App\Models\AdminLog; // 🔹 Tambahan untuk log aktivitas
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $userCount = User::count();
        $assetCount = Content::count();
        $contentCount = Content::count();

        /*
            ⚠️ FUNGSI UTAMA STATISTIK SEMENTARA DI 7 HARI TERAKHIR — JANGAN SENTUH!
        */
        $visitors = Visitor::selectRaw('visit_date, COUNT(DISTINCT ip_address) as total')
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'ASC')
            ->where('visit_date', '>=', now()->subDays(6))
            ->get();

        $labels = $visitors->pluck('visit_date')->map(fn($d) => Carbon::parse($d)->format('d M'));
        $data = $visitors->pluck('total');

        /*
            Log Aktivitas Admin
        */
        $query = AdminLog::query();

        if ($request->has('filter') && $request->filter != '') {
            $query->where('activity', 'like', '%' . $request->filter . '%');
        }

        $adminLogs = $query->latest()->paginate(6);

        return view('admin.dashboard', compact(
            'userCount',
            'assetCount',
            'contentCount',
            'labels',
            'data',
            'adminLogs'
        ));
    }

    public function getVisitorStats()
    {
        $visitors = Visitor::selectRaw('visit_date, COUNT(DISTINCT ip_address) as total')
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'ASC')
            ->where('visit_date', '>=', now()->subDays(6))
            ->get();

        return response()->json($visitors);
    }
}
