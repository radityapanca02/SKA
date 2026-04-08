<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Dashboard Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #e0c3fc, #8ec5fc, #fbc2eb);
            background-size: 200% 200%;
            animation: gradientShift 10s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .glass-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .input-glass {
            background-color: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #333;
        }

        .input-glass::placeholder {
            color: rgba(60, 60, 60, 0.6);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 text-gray-800">
    <div class="glass-card max-w-md w-full rounded-2xl p-8 text-center shadow-2xl">
        <div class="mb-8">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-white/40 flex items-center justify-center shadow-md">
                <img src="{{ asset('assets/icon.png') }}" alt="logo_ska" class="w-12 h-12 object-contain" />
            </div>
            <h1 class="text-2xl font-bold tracking-wide text-gray-800">Login Admin Sekolah</h1>
            <p class="text-sm text-gray-600 mt-1">Selamat datang di dashboard sekolah</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm text-left">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5 text-left">
            @csrf
            <div>
                <label for="username" class="block text-sm font-semibold mb-1 text-gray-700">
                    <i class="fas fa-user mr-2"></i>Username
                </label>
                <input type="text" name="username" id="username" required
                    class="input-glass w-full px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none placeholder-gray-400"
                    placeholder="Masukkan username" value="{{ old('username') }}">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-1 text-gray-700">
                    <i class="fas fa-lock mr-2"></i>Password
                </label>
                <input type="password" name="password" id="password" required
                    class="input-glass w-full px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none placeholder-gray-400"
                    placeholder="Masukkan password">
            </div>

            <button type="submit"
                class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-3 rounded-lg font-semibold transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
            </button>
        </form>

        <div class="mt-6 text-sm text-gray-600">
            <p>© 2025 SMK PRGI 3 Malang. All right reserved.</p>
        </div>
    </div>

        <script>
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
    </script>
</body>

</html>