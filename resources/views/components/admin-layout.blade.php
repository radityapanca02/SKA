<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ $assetBase }}/assets/skariga300rbg.png" type="image/x-icon">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img class="w-16 h-12 md:w-24 md:h-16 object-contain"
                        src="{{ $assetBase }}/assets/skariga logo 1.png" alt="Logo SMK PGRI 3 Malang">
                    <h1 class="text-xl font-semibold text-gray-800 ml-4">SKARIGA Admin Panel</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- User info dengan badge role -->
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-700">{{ Auth::user()->username }}</p>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs px-2 py-1 rounded-full
                                @if(Auth::user()->isSuperadmin()) bg-purple-100 text-purple-800
                                @elseif(Auth::user()->isAdmin()) bg-blue-100 text-blue-800
                                @elseif(Auth::user()->isEditor()) bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-700
                                @endif">
                                {{ Auth::user()->role }}
                            </span>
                            @if(!Auth::user()->verifyRoleKey())
                            <span class="text-xs px-2 py-1 rounded-full bg-red-100 text-red-800">
                                Invalid Key
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Logout form -->
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition"
                            onclick="return confirm('Yakin ingin logout?')">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Menu - Responsive -->
    <nav class="bg-gray-800 overflow-x-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-nowrap md:flex-wrap gap-1 md:gap-2 py-2 md:py-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fa-solid fa-chart-column mr-1 sm:mr-2"></i><span class="hidden sm:inline">Dashboard</span>
                </a>

                <!-- Menu untuk semua role -->
                <a href="{{ route('admin.berita.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.berita.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-newspaper mr-1 sm:mr-2"></i><span class="hidden sm:inline">Berita</span>
                </a>

                <a href="{{ route('admin.profil.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.profil.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-school mr-1 sm:mr-2"></i><span class="hidden sm:inline">Profil</span>
                </a>

                <a href="{{ route('admin.jurusan.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.jurusan.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-list mr-1 sm:mr-2"></i><span class="hidden sm:inline">Jurusan</span>
                </a>

                <a href="{{ route('admin.ekskul.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.ekskul.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-football-ball mr-1 sm:mr-2"></i><span class="hidden sm:inline">Ekstrakurikuler</span>
                </a>

                <a href="{{ route('admin.prestasi.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.prestasi.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-trophy mr-1 sm:mr-2"></i><span class="hidden sm:inline">Prestasi</span>
                </a>

                <a href="{{ route('admin.alumni.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.alumni.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-graduation-cap mr-1 sm:mr-2"></i><span class="hidden sm:inline">Alumni</span>
                </a>

                <a href="{{ route('admin.pendaftaran.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-user-plus mr-1 sm:mr-2"></i><span class="hidden sm:inline">Pendaftaran</span>
                </a>

                <a href="{{ route('admin.marquee.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.marquee.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-font-awesome mr-1 sm:mr-2"></i><span class="hidden sm:inline">Marquee</span>
                </a>

                <!-- Hanya SUPERADMIN yang bisa melihat Logs dan User Management -->
                @if(Auth::user()->canViewLogs())
                <a href="{{ route('admin.logs.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.logs.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-history mr-1 sm:mr-2"></i><span class="hidden sm:inline">Logs</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-users mr-1 sm:mr-2"></i><span class="hidden sm:inline">Users</span>
                </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Flash Messages -->
        @if(session('success'))
        <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div> -->
        @endif

        @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        </div>
        @endif

        <!-- Page Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" id="admin-content">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="text-center text-gray-500 text-sm" x-data="{ time: new Date().toLocaleTimeString() }"
                x-init="setInterval(() => time = new Date().toLocaleTimeString(), 1000)">
                &copy; 2026 SMK PGRI 3 Malang Admin Panel - <span class="font-bold" x-text="time"></span>
            </div>
        </div>
    </footer>

    <!-- Dynamic Vite Assets -->
    @vite(['resources/ts/app.ts', 'resources/css/app.css', 'resources/js/admin-pagination.js'])
</body>

</html>