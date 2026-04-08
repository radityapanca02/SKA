<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    /**
     * Catat pengunjung (dipanggil otomatis dari frontend)
     */
    public function track(Request $request)
    {
        $ip = $this->getRealIp($request);
        $userAgent = $request->userAgent();
        $today = now()->toDateString();

        // Ambil atau buat UUID cookie
        $visitorUuid = $request->cookie('visitor_id') ?? Str::uuid()->toString();
        Cookie::queue('visitor_id', $visitorUuid, 60 * 24 * 30); // 30 hari

        // Hindari duplikasi pengunjung per hari
        $exists = Visitor::where('visitor_uuid', $visitorUuid)
            ->where('visit_date', $today)
            ->exists();

        if (! $exists) {
            Visitor::create([
                'visitor_uuid' => $visitorUuid,
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'visit_date' => $today,
            ]);
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * API statistik pengunjung (7 hari terakhir)
     */
    public function stats()
    {
        $stats = Visitor::select(DB::raw('visit_date, COUNT(*) as total'))
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'asc')
            ->where('visit_date', '>=', now()->subDays(6))
            ->get();

        $labels = $stats->pluck('visit_date');
        $data = $stats->pluck('total');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    public function Update()
    {
        $stats = Visitor::select(DB::raw('visit_date, COUNT(*) as total'))
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'asc')
            ->where('visit_date', '>=', now()->subDays(6))
            ->get();

        $labels = $stats->pluck('visit_date');
        $data = $stats->pluck('total');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    private function getRealIp(Request $request)
    {
        $headers = [
            'CF-Connecting-IP',
            'X-Forwarded-For',
            'X-Real-IP',
            'Forwarded',
            'X-Client-IP',
        ];

        foreach ($headers as $header) {
            if ($request->headers->has($header)) {
                $ips = explode(',', $request->headers->get($header));
                return trim($ips[0]);
            }
        }

        return $request->ip();
    }
}
