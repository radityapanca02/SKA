<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        // Cek jika user aktif
        if (!$user->is_active) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Akun Anda telah dinonaktifkan.');
        }

        // Cek role (SUPERADMIN, ADMIN, atau EDITOR)
        if (!in_array($user->role, ['SUPERADMIN', 'ADMIN', 'EDITOR'])) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Akses ditolak.');
        }

        // Verify role key
        if (!$user->verifyRoleKey()) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Role key tidak valid.');
        }

        return $next($request);
    }
}
