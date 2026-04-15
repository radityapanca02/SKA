<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cek jika user aktif
        if (!$user->is_active) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Akun Anda telah dinonaktifkan.');
        }

        if (!in_array($user->role, ['SUPERADMIN', 'ADMIN', 'EDITOR'])) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Akses ditolak.');
        }

        if (!$user->verifyRoleKey()) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Role key tidak valid.');
        }

        return $next($request);
    }
}
