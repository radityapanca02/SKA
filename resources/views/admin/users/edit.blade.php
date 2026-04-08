@extends('admin.layout')

@section('title', 'Edit Admin')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header Section -->
    <div class="mb-6 sm:mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-user-shield text-white text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">Edit Admin</h1>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Kelola akses dan informasi administrator</p>
            </div>
        </div>
    </div>

    @if(isset($user) && $user)
    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
        <!-- User Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 p-6 sm:p-8">
                <!-- Profile Avatar -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto bg-gradient-to-br from-blue-400 to-cyan-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl sm:text-3xl shadow-lg mb-4">
                        {{ strtoupper(substr($user->username, 0, 2)) }}
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900">{{ $user->username }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $user->email ?? 'No email' }}</p>
                    <div class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium mt-3">
                        <i class="fas fa-shield-alt"></i>
                        <span>Administrator</span>
                    </div>
                </div>

                <!-- User Stats -->
                <div class="space-y-3 border-t border-gray-200/60 pt-6">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">User ID</span>
                        <span class="text-sm font-medium text-gray-900">{{ $user->id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Status</span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                            <i class="fas fa-circle text-[8px]"></i>
                            Active
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Terakhir Diupdate</span>
                        <span class="text-sm text-gray-900">{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-50 to-pink-50/80 px-6 py-4 border-b border-gray-200/60">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-edit text-blue-500"></i>
                        Informasi Admin
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">Perbarui data akses administrator</p>
                </div>

                <!-- Form Content -->
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="p-6 sm:p-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Username Field -->
                        <div class="group">
                            <label for="username" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user text-blue-500 text-xs"></i>
                                Username
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       name="username" 
                                       id="username" 
                                       required
                                       value="{{ old('username', $user->username) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                       placeholder="Masukkan username">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-user text-gray-400 group-focus-within:text-blue-500"></i>
                                </div>
                            </div>
                            @error('username')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="group">
                            <label for="email" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope text-blue-500 text-xs"></i>
                                Email
                                <span class="text-xs text-gray-500">(opsional)</span>
                            </label>
                            <div class="relative">
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       value="{{ old('email', $user->email) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                       placeholder="admin@example.com">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-envelope text-gray-400 group-focus-within:text-blue-500"></i>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="group">
                            <label for="password" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-lock text-blue-500 text-xs"></i>
                                Password Baru
                                <span class="text-xs text-gray-500">(kosongkan jika tidak diubah)</span>
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       name="password" 
                                       id="password"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                       placeholder="Masukkan password baru">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-key text-gray-400 group-focus-within:text-blue-500"></i>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-6 mt-8 border-t border-gray-200/60">
                        <a href="{{ route('admin.users.index') }}" 
                           class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-all duration-200 group">
                            <i class="fas fa-times text-gray-500 group-hover:text-gray-700"></i>
                            Batal
                        </a>
                        <button type="submit" 
                                class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 group">
                            <i class="fas fa-save group-hover:scale-110 transition-transform"></i>
                            Update Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <!-- Error State -->
    <div class="max-w-md mx-auto">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 p-8 text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-red-100 to-red-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-slash text-red-500 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Admin Tidak Ditemukan</h3>
            <p class="text-gray-600 mb-6">Administrator yang Anda cari tidak ditemukan.</p>
            <a href="{{ route('admin.users.index') }}" 
               class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar
            </a>
        </div>
    </div>
    @endif
</div>

<style>
.group:focus-within label {
    color: #8b5cf6;
}
.group:focus-within .fa-user,
.group:focus-within .fa-envelope,
.group:focus-within .fa-lock,
.group:focus-within .fa-user-tag {
    color: #8b5cf6;
}
</style>
@endsection