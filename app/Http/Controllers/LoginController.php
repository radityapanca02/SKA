<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Cek dulu apakah user exists dan aktif
        $user = User::where('username', $credentials['username'])->first();

        if ($user) {
            // Jika user ditemukan tapi tidak aktif
            if (!$user->is_active) {
                // Log activity tanpa user_id (karena user tidak aktif)
                ActivityLog::create([
                    'user_id' => null, // Set null untuk user tidak aktif
                    'action' => 'LOGIN_FAILED',
                    'model_type' => User::class,
                    'model_id' => $user->id,
                    'description' => "Failed login attempt - account inactive for username: {$credentials['username']}",
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);

                return redirect()->back()->with('error', 'Akun Anda telah dinonaktifkan.');
            }

            // Jika user aktif, coba login
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Log activity login berhasil
                ActivityLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'LOGIN',
                    'model_type' => User::class,
                    'model_id' => Auth::id(),
                    'description' => "User logged in: {$user->username}",
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);

                return redirect()->route('admin.dashboard');
            }
        }

        // Log activity untuk login gagal (username/password salah)
        ActivityLog::create([
            'user_id' => null, // Set null karena login gagal
            'action' => 'LOGIN_FAILED',
            'model_type' => User::class,
            'model_id' => $user->id ?? null,
            'description' => "Failed login attempt for username: {$credentials['username']}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        // Log activity logout
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'LOGOUT',
                'model_type' => User::class,
                'model_id' => Auth::id(),
                'description' => "User logged out: " . Auth::user()->username,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
