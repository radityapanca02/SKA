<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SMK PGRI 3 Malang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flyonui/dist/flyonui.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ $assetBase . '/assets/skariga300rbg.png' }}" type="image/x-icon">
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-sm border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-2"><span class="text-customOrange">SKARIGA</span> Admin Panel Login</h2>

        @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
            @csrf

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off" class="w-full border border-gray-300 bg-gray-50 text-gray-700 rounded-lg px-3 py-2
                focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" style="font-family: 'Courier New', Courier, monospace;" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 bg-gray-50 text-gray-700 rounded-lg px-3 py-2
                    focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" style="font-family: 'Courier New', Courier, monospace;" />
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-blue-600 transition">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="btn w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                Login
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6"><b>&copy;</b> {{ date('Y') }} CTRL + V SMK PGRI 3 Malang</p>
    </div>

    <script>
    // Toggle show/hide password (versi SVG yang smooth)
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    let show = false;
    togglePassword.addEventListener('click', () => {
        show = !show;
        passwordInput.setAttribute('type', show ? 'text' : 'password');
        eyeIcon.innerHTML = show ?
            `<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.959 9.959 0 012.091-3.366M9.88 9.88A3 3 0 0114.12 14.12M6.1 6.1l11.8 11.8"/>` :
            `<path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>`;
    });
    </script>

    @vite(['resources/ts/app.ts', 'resources/css/app.css'])
</body>

</html>
