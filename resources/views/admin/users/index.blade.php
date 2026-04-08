<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen User</h1>

        @if(auth()->user()->canManageUsers())
        <a href="{{ route('admin.users.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah User
        </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $user->username }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            @if($user->role == 'ADMIN') bg-blue-100 text-blue-800
                            @elseif($user->role == 'EDITOR') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            @if($user->is_active) bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ $user->is_active ? 'AKTIF' : 'NONAKTIF' }}
                        </span>
                    </td>
                    <td class="p-3 text-center">
                        @if(auth()->user()->canManageUsers())
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif

                            @if(auth()->user()->canDelete())
                            <span class="text-gray-400">|</span>
                            <!-- Toggle Status Form dengan method PATCH -->
                            <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="text-{{ $user->is_active ? 'yellow' : 'green' }}-600 hover:underline text-sm">
                                    <i class="fas fa-{{ $user->is_active ? 'pause' : 'play' }} mr-1"></i>
                                    {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                            </form>

                            @if($user->id !== auth()->id())
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                            @endif
                            @endif
                        </div>
                        @else
                        <span class="text-gray-400 text-sm">No Access</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        @if(auth()->user()->isAdmin())
                        Tidak ada user EDITOR yang ditemukan
                        @else
                        Tidak ada user yang ditemukan
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

    <!-- Quick Stats -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-users text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-xl font-bold">{{ $users->total() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-user-check text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Active Users</p>
                    <p class="text-xl font-bold">{{ $users->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-shield-alt text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Your Role</p>
                    <p class="text-sm font-semibold">
                        @if(Auth::user()->isSuperadmin())
                        SUPERADMIN
                        @elseif(Auth::user()->isAdmin())
                        ADMIN
                        @else
                        EDITOR
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
