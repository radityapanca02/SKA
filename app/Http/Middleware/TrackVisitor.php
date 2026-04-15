<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Cookie;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
{
    if ($this->shouldSkipTracking($request)) {
        return $next($request);
    }

    $visitorId = Cookie::get('visitor_id') ?? 'visitor_'.md5(uniqid().$request->ip().$request->userAgent());
    Cookie::queue('visitor_id', $visitorId, 60 * 24 * 30);

    Visitor::updateOrCreate(
        ['visitor_id' => $visitorId],
        [
            'ip_address' => $request->ip(),
            'user_agent' => substr($request->userAgent(), 0, 255),
            'page' => $request->fullUrl(),
            'visited_at' => now(),
        ]
    );

    return $next($request);
}

    private function shouldSkipTracking(Request $request): bool
    {
        $path = $request->path();
        return str_contains($path, '/admin') ||
               str_contains($path, 'admin/dashboard') ||
               str_contains($path, '/visitors/api') ||
               $request->ajax();
    }
}
