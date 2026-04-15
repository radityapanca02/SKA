<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Tambah User Baru</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" class="w-full border rounded p-2" required
                maxlength="50">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required minlength="6">
            </div>

            <div>
                <label class="block mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2" required
                    minlength="6">
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium">Role</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="">Pilih Role</option>
                @if(auth()->user()->isSuperadmin())
                <option value="ADMIN" @selected(old('role')=='ADMIN' )>ADMIN</option>
                <option value="EDITOR" @selected(old('role')=='EDITOR' )>EDITOR</option>
                @elseif(auth()->user()->isAdmin())
                <option value="EDITOR" @selected(old('role')=='EDITOR' )>EDITOR</option>
                @endif
            </select>
            @if(auth()->user()->isAdmin())
            <p class="text-sm text-gray-500 mt-1">Admin hanya dapat membuat user dengan role EDITOR</p>
            @endif
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Simpan User
            </button>
            <a href="{{ route('admin.users.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
