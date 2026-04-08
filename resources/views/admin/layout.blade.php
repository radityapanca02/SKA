<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Website Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        canvas {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100 flex h-screen overflow-x-hidden">

    <div class="fixed left-4 top-1/2 -translate-y-1/2 bg-blue-800/80 backdrop-blur-lg text-white rounded-2xl shadow-xl flex flex-col items-center py-4 w-16 hover:w-56 transition-all duration-300 z-50 group">
        <div class="mb-6 text-center">
            <!-- <img src="{{ asset('assets/icon.png') }}" alt="logo_main"> -->
            <i class="fas fa-graduation-cap text-3xl text-blue-200"></i>
            <span class="hidden group-hover:inline text-sm font-medium">SKARIGA</span>
        </div>

        <nav class="flex flex-col space-y-3 w-full px-2">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-700 transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                <i class="fas fa-tachometer-alt text-lg"></i>
                <span class="hidden group-hover:inline text-sm font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-700 transition-all {{ request()->routeIs('admin.users.*') ? 'bg-blue-700' : '' }}">
                <i class="fas fa-users text-lg"></i>
                <span class="hidden group-hover:inline text-sm font-medium">Users</span>
            </a>

            <a href="{{ route('admin.contents.index') }}"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-700 transition-all {{ request()->routeIs('admin.contents.*') ? 'bg-blue-700' : '' }}">
                <i class="fas fa-file-alt text-lg"></i>
                <span class="hidden group-hover:inline text-sm font-medium">Konten</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-6 w-full">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-red-600 w-full text-red-200 hover:text-white transition-all">
                    <i class="fas fa-sign-out-alt text-lg"></i>
                    <span class="hidden group-hover:inline text-sm font-medium">Logout</span>
                </button>
            </form>
        </nav>
    </div>

    <div class="flex-1 flex flex-col ml-24 transition-all duration-300 group-hover:ml-60">
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Dashboard Admin</h2>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Selamat datang, <strong>{{ Auth::user()->username }}</strong></span>
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
    <script>
        (function () {
            function detectDevTools() {
                const widthThreshold = window.outerWidth - window.innerWidth > 160;
                const heightThreshold = window.outerHeight - window.innerHeight > 160;

                if (widthThreshold || heightThreshold) {
                    document.body.innerHTML = '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial, sans-serif;"><div style="text-align: center;"><h1 style="color: #dc2626;">Akses Ditolak</h1><p>Ngapain lihat lihat kocak</p></div></div>';
                    throw new Error('DevTools detected');
                }
            }
            detectDevTools();
            window.addEventListener('resize', detectDevTools);
            const originalConsole = {
                log: console.log,
                warn: console.warn,
                error: console.error,
                info: console.info
            };

            ['log', 'warn', 'error', 'info'].forEach(method => {
                console[method] = function () {
                    detectDevTools();
                    originalConsole[method].apply(console, arguments);
                };
            });
        })();
    </script>
</body>

</html>
