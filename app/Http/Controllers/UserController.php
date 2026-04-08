<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    $admin = auth()->user();

    $request->validate([
        'username' => 'required|unique:users',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    $newUser = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    AdminLog::create([
        'admin_name' => $admin->name ?? $admin->username,
        'activity' => "Menambahkan user baru: {$newUser->username}",
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat.');
}


    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.users.edit', compact('user'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.users.index')->with('error', 'User tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'nullable|email'
        ]);

        try {
            $user = User::findOrFail($id);
            
            $data = [
                'username' => $request->username,
                'email' => $request->email
            ];

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);
            
            AdminLog::create([
                'admin_name' => $user->name ?? $user->username,
                'activity' => "Mengupdate user baru: {$user->username}",
            ]);

            return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.users.index')->with('error', 'User tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.users.index')->with('error', 'User tidak ditemukan.');
        }
    }
}