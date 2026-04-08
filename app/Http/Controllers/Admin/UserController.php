<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        // Cek permission untuk view users
        if (!$currentUser->canManageUsers()) {
            abort(403, 'Unauthorized action.');
        }

        // Filter users berdasarkan role
        if ($currentUser->isSuperadmin()) {
            $users = User::where('role', '!=', 'SUPERADMIN')->latest()->paginate(10);
        } elseif ($currentUser->isAdmin()) {
            $users = User::where('role', 'EDITOR')->latest()->paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $currentUser = Auth::user();

        // Cek permission untuk create user
        if (!$currentUser->canManageUsers()) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $currentUser = Auth::user();

        // Cek permission untuk create user
        if (!$currentUser->canManageUsers()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi role berdasarkan user yang login
        $allowedRoles = [];
        if ($currentUser->isSuperadmin()) {
            $allowedRoles = 'required|in:ADMIN,EDITOR';
        } elseif ($currentUser->isAdmin()) {
            $allowedRoles = 'required|in:EDITOR';
        }

        $request->validate([
            'username' => 'required|unique:users|max:50',
            'password' => 'required|min:6|confirmed',
            'role' => $allowedRoles,
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true,
        ]);

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'CREATE',
            'model_type' => User::class,
            'model_id' => $user->id,
            'description' => "Created new user: {$user->username} ({$user->role})",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat!');
    }

    public function edit(User $user)
    {
        $currentUser = Auth::user();

        // Cek permission untuk edit user
        if (!$currentUser->canManageUsers() || !$this->canModifyUser($currentUser, $user)) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $currentUser = Auth::user();

        // Cek permission untuk update user
        if (!$currentUser->canManageUsers() || !$this->canModifyUser($currentUser, $user)) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi role berdasarkan user yang login
        $allowedRoles = [];
        if ($currentUser->isSuperadmin()) {
            $allowedRoles = 'required|in:ADMIN,EDITOR';
        } elseif ($currentUser->isAdmin()) {
            $allowedRoles = 'required|in:EDITOR';
        }

        $request->validate([
            'username' => 'required|max:50|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => $allowedRoles,
            'is_active' => 'boolean',
        ]);

        $updateData = [
            'username' => $request->username,
            'role' => $request->role,
            'is_active' => $request->is_active ?? false,
        ];

        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'model_type' => User::class,
            'model_id' => $user->id,
            'description' => "Updated user: {$user->username} ({$user->role})",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $currentUser = Auth::user();

        // Prevent self-deletion
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        // Cek permission untuk delete user
        if (!$currentUser->canManageUsers() || !$this->canModifyUser($currentUser, $user)) {
            abort(403, 'Unauthorized action.');
        }

        $username = $user->username;
        $user->delete();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'DELETE',
            'model_type' => User::class,
            'model_id' => $user->id,
            'description' => "Deleted user: {$username}",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }

    public function toggleStatus(User $user)
    {
        $currentUser = Auth::user();

        // Prevent self-deactivation
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Tidak dapat menonaktifkan akun sendiri!');
        }

        // Cek permission untuk toggle status user
        if (!$currentUser->canManageUsers() || !$this->canModifyUser($currentUser, $user)) {
            abort(403, 'Unauthorized action.');
        }

        $user->update([
            'is_active' => !$user->is_active
        ]);

        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'model_type' => User::class,
            'model_id' => $user->id,
            'description' => "{$status} user: {$user->username}",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->back()->with('success', "User berhasil $status!");
    }

    // Helper method untuk cek permission modify user
    private function canModifyUser($currentUser, $targetUser)
    {
        if ($currentUser->isSuperadmin()) {
            return $targetUser->role !== 'SUPERADMIN';
        } elseif ($currentUser->isAdmin()) {
            return $targetUser->role === 'EDITOR';
        }
        return false;
    }
}
