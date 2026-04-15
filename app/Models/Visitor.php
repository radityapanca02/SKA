<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'visitor_id',
        'ip_address',
        'user_agent',
        'page',
        'visited_at',
        'is_active',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public static function getActiveVisitorsCount()
    {
        return self::where('visited_at', '>=', now()->subMinutes(1))
            ->distinct('visitor_id')
            ->count('visitor_id');
    }

    public static function getTotalUniqueVisitors()
    {
        return self::distinct('visitor_id')->count('visitor_id');
    }

    public static function getTodayVisitorsCount()
    {
        return self::whereDate('visited_at', today())
            ->distinct('visitor_id')
            ->count('visitor_id');
    }

    // Hapus method markInactiveVisitors() dan cleanupOldVisitors()
    // karena kita tidak butuh field is_active lagi
}
