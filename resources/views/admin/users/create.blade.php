@extends('admin.layout')

@section('title', 'Tambah User')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header Section -->
    <div class="mb-6 sm:mb-8">
        <div class="flex items-center justify-center gap-4">
            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-user-plus text-white text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">Tambah User Baru</h1>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Buat akun pengguna baru untuk sistem</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-2xl mx-auto">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50/80 px-6 py-4 border-b border-gray-200/60">
                <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-user-circle text-blue-500"></i>
                    Informasi User Baru
                </h3>
                <p class="text-sm text-gray-600 mt-1">Isi form berikut untuk membuat user baru</p>
            </div>

            <!-- Form Content -->
            <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 sm:p-8">
                @csrf
                
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
                                   value="{{ old('username') }}"
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
                        </label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   required
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="user@example.com">
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
                            Password
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="Masukkan password">
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
                        <i class="fas fa-user-plus group-hover:scale-110 transition-transform"></i>
                        Buat User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.group:focus-within label {
    color: #3b82f6;
}
.group:focus-within .fa-user,
.group:focus-within .fa-envelope,
.group:focus-within .fa-lock,
.group:focus-within .fa-eye {
    color: #3b82f6;
}
</style>
@endsection