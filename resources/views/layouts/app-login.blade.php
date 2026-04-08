<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Toggle sidebar di mobile
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
    </script>
</head>

<body class="flex bg-gray-100">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed md:static inset-y-0 left-0 w-64 bg-white shadow-md z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">
        <div class="p-4 border-b">
            <h1 class="text-2xl font-bold text-blue-600">Dashboard Admin</h1>
        </div>
        <nav class="p-4 space-y-2">
            {{-- Dashboard Users --}}
            <a href="{{ route('dashboard.index') }}"
                class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->is('admin/dashboard*') ? 'bg-blue-500 text-white' : '' }}">
                Dashboard
            </a>

            {{-- Assets Upload --}}
            <a href="/asset"
                class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->is('assets/upload*') ? 'bg-blue-500 text-white' : '' }}">
                Assets Upload
            </a>

            {{-- Konten --}}
            <a href="{{ route('kontent.index') }}"
                class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->is('kontent*') ? 'bg-blue-500 text-white' : '' }}">
                Konten
            </a>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left block px-4 py-2 rounded hover:bg-red-100 text-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Navbar Mobile -->
        <header class="bg-white shadow-md p-4 flex items-center justify-between md:hidden">
            <button onclick="toggleSidebar()" class="text-gray-700 focus:outline-none">
                <!-- Burger icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <span class="font-bold">Dashboard</span>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
        {{-- <script>
                (function () {
            function detectDevTools() {
                const widthThreshold = window.outerWidth - window.innerWidth > 160;
                const heightThreshold = window.outerHeight - window.innerHeight > 160;

                if (widthThreshold || heightThreshold) {
                    document.body.innerHTML = '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial, sans-serif;"><div style="text-align: center;"><h1 style="color: #dc2626;">Akses Ditolak</h1><p>No no ya</p></div></div>';
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
    </script> --}}

</body>

</html>