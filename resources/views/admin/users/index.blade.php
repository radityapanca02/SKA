@extends('admin.layout')

@section('title', 'Manajemen Users')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 sm:mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Manajemen Users</h2>
            <p class="text-gray-600 text-sm sm:text-base">Kelola data pengguna sistem dengan mudah</p>
        </div>
        <a href="{{ route('admin.users.create') }}" 
           class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus text-sm sm:text-base"></i>
            <span class="text-sm sm:text-base font-medium">Tambah User</span>
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl overflow-hidden border border-gray-200/50">
        @if($users->count() > 0)
            <!-- Desktop Table -->
            <div class="hidden lg:block">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/60">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center text-white font-semibold text-sm sm:text-base shadow-md">
                                            {{ strtoupper(substr($user->username, 0, 2)) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-medium text-gray-900 bg-gray-100 px-3 py-1 rounded-lg">{{ $user->username }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600">{{ $user->email ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-edit text-xs"></i>
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile & Tablet Cards -->
            <div class="lg:hidden p-4 sm:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    @foreach($users as $user)
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200/50 p-4 sm:p-6 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start gap-3 sm:gap-4">
                                <!-- Profile Picture -->
                                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center text-white font-semibold text-sm sm:text-base shadow-md flex-shrink-0">
                                    {{ strtoupper(substr($user->username, 0, 2)) }}
                                </div>
                                
                                <!-- User Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
                                        <div>
                                            <h3 class="text-sm sm:text-base font-semibold text-gray-900 truncate">
                                                {{ $user->name ?? $user->username }}
                                            </h3>
                                            <p class="text-xs text-gray-500 mt-1">@{{ $user->username }}</p>
                                        </div>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 self-start">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span>
                                            Active
                                        </span>
                                    </div>
                                    
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <p class="text-xs text-gray-600 mb-1">Email</p>
                                        <p class="text-sm text-gray-900 truncate">{{ $user->email ?? '-' }}</p>
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="flex items-center gap-2 pt-2 border-t border-gray-200/60">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                           class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-edit text-xs"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="flex-1" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-full inline-flex items-center justify-center gap-1 px-3 py-2 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200">
                                                <i class="fas fa-trash text-xs"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="p-8 sm:p-12 text-center">
                <div class="max-w-md mx-auto">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-gray-400 text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2">Belum ada data user</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-6">Mulai dengan menambahkan user pertama Anda</p>
                    <a href="{{ route('admin.users.create') }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span class="font-medium">Tambah User Pertama</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.');
}
</script>
@endsection