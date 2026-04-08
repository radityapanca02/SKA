<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;



class SuperadminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (!Auth::user()->isSuperadmin()) {
            abort(403, 'Unauthorized action. Superadmin access required.');
        }

        return $next($request);
    }
}
