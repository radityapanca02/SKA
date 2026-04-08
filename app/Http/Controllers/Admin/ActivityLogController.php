<?php
// app/Http/Controllers/Admin/ActivityLogController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Cek permission untuk view logs
        if (!Auth::user()->canViewLogs()) {
            abort(403, 'Unauthorized action.');
        }

        $logs = ActivityLog::with('user')
            ->latest()
            ->paginate(20);

        $stats = [
            'total' => ActivityLog::count(),
            'today' => ActivityLog::whereDate('created_at', today())->count(),
            'active_users' => ActivityLog::whereDate('created_at', today())
                ->distinct('user_id')
                ->count('user_id'),
            'filtered' => $logs->count()
        ];

        return view('admin.logs.index', compact('logs', 'stats'));
    }

    public function filter(Request $request)
    {
        // Cek permission untuk view logs
        if (!Auth::user()->canViewLogs()) {
            abort(403, 'Unauthorized action.');
        }

        $query = ActivityLog::with('user');

        // Filter by action
        if ($request->action && $request->action !== 'all') {
            $query->where('action', $request->action);
        }

        // Filter by date range
        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $logs = $query->latest()->paginate(20);

        // Hitung stats untuk filtered data
        $stats = [
            'total' => ActivityLog::count(),
            'today' => ActivityLog::whereDate('created_at', today())->count(),
            'active_users' => ActivityLog::whereDate('created_at', today())
                ->distinct('user_id')
                ->count('user_id'),
            'filtered' => $logs->count()
        ];

        // Pertahankan parameter filter di pagination
        $logs->appends($request->all());

        return view('admin.logs.index', compact('logs', 'stats'));
    }

    public function show(ActivityLog $log)
    {
        // Cek permission untuk view logs
        if (!Auth::user()->canViewLogs()) {
            abort(403, 'Unauthorized action.');
        }

        $log->load('user');
        return view('admin.logs.show', compact('log'));
    }

    public function destroy(ActivityLog $log)
    {
        // Cek permission untuk delete logs (hanya SUPERADMIN)
        if (!Auth::user()->canDeleteLogs()) {
            abort(403, 'Unauthorized action.');
        }

        $log->delete();

        return redirect()->route('admin.logs.index')
            ->with('success', 'Log berhasil dihapus!');
    }

    public function clearOldLogs()
    {
        // Cek permission untuk delete logs (hanya SUPERADMIN)
        if (!Auth::user()->canDeleteLogs()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus logs yang lebih dari 30 hari
        $cutoffDate = Carbon::now()->subDays(30);
        ActivityLog::where('created_at', '<', $cutoffDate)->delete();

        return redirect()->route('admin.logs.index')
            ->with('success', 'Logs lama berhasil dibersihkan!');
    }
}
