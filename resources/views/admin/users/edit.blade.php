<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit User: {{ $user->username }}</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                class="w-full border rounded p-2" required maxlength="50">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="w-full border rounded p-2" minlength="6">
            </div>

            <div>
                <label class="block mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2" minlength="6">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Role</label>
                <select name="role" class="w-full border rounded p-2" required>
                    @if(auth()->user()->isSuperadmin())
                        @if($user->role !== 'SUPERADMIN')
                        <option value="ADMIN" @selected(old('role', $user->role) == 'ADMIN')>ADMIN</option>
                        <option value="EDITOR" @selected(old('role', $user->role) == 'EDITOR')>EDITOR</option>
                        @else
                        <option value="SUPERADMIN" selected>SUPERADMIN</option>
                        @endif
                    @elseif(auth()->user()->isAdmin())
                        <option value="EDITOR" @selected(old('role', $user->role) == 'EDITOR')>EDITOR</option>
                    @endif
                </select>
                @if(auth()->user()->isAdmin())
                <p class="text-sm text-gray-500 mt-1">Admin hanya dapat mengubah role menjadi EDITOR</p>
                @endif
                @if($user->role === 'SUPERADMIN' && auth()->user()->isSuperadmin())
                <p class="text-sm text-yellow-600 mt-1">SUPERADMIN role tidak dapat diubah</p>
                @endif
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2">Aktif</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded">
            <h3 class="font-medium mb-2">Informasi Role Key</h3>
            <p class="text-sm text-gray-600 mb-2">Role key akan otomatis digenerate berdasarkan role yang dipilih:</p>
            <code class="text-xs bg-gray-100 px-2 py-1 rounded font-mono block break-all">
                {{ $user->role_key }}
            </code>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-save mr-2"></i>Update User
            </button>
            <a href="{{ route('admin.users.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
