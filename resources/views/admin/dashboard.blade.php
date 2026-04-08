<x-admin-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Message dengan Role -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900">
                    Selamat Datang, {{ Auth::user()->username }}!
                </h1>
                <p class="text-gray-600 mt-8">
                    Anda login sebagai <span class="font-semibold capitalize">{{ Auth::user()->role }}</span>
                </p>
            </div>

            <!-- Visitor Statistics Section -->
            <div class="mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Total Pengunjung -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium">Total Pengunjung</p>
                                <p class="text-3xl font-bold mt-2" id="totalVisitors">0</p>
                            </div>
                            <div class="bg-blue-400 p-3 rounded-full">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pengunjung Aktif -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Pengunjung Aktif</p>
                                <p class="text-3xl font-bold mt-2" id="activeVisitors">0</p>
                            </div>
                            <div class="bg-green-400 p-3 rounded-full">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pengunjung Hari Ini -->
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium">Pengunjung Hari Ini</p>
                                <p class="text-3xl font-bold mt-2" id="todayVisitors">0</p>
                            </div>
                            <div class="bg-purple-400 p-3 rounded-full">
                                <i class="fas fa-calendar-day text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visitor Chart -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Pengunjung 7 Hari Terakhir</h3>
                    <div class="h-[350px] w-full">
                        <canvas id="visitorsChart"></canvas>
                    </div>
                    <p id="loadingText" class="text-center text-gray-500 mt-4">Memuat data pengunjung...</p>
                </div>
            </div>

            <!-- Content Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Berita -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-blue-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                <i class="fas fa-newspaper text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Berita
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['berita'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alumni -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-green-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 p-3 rounded-lg">
                                <i class="fas fa-graduation-cap text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Alumni
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['alumni'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prestasi -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-yellow-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-100 p-3 rounded-lg">
                                <i class="fas fa-trophy text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Prestasi
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['prestasi'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ekstrakurikuler -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-purple-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 p-3 rounded-lg">
                                <i class="fas fa-football-ball text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Ekskul
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['ekskul'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUPERADMIN Only Statistics -->
            @if(Auth::user()->isSuperadmin())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Activity Logs -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-red-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 p-3 rounded-lg">
                                <i class="fas fa-history text-red-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Activity Logs
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['logs'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-white overflow-hidden shadow rounded-lg border-l-4 border-indigo-500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-lg">
                                <i class="fas fa-users text-indigo-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Users
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900">
                                        {{ $stats['users'] ?? 'Unavailable' }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Quick Actions berdasarkan Role -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @if(Auth::user()->canCreate())
                    <a href="{{ route('admin.berita.create') }}"
                        class="bg-blue-50 border border-blue-200 rounded-lg p-4 hover:bg-blue-100 transition group">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-2 rounded-lg group-hover:bg-blue-200 transition">
                                <i class="fas fa-plus text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-medium text-blue-900">Tambah Berita</h3>
                                <p class="text-sm text-blue-600">Buat berita baru</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.alumni.create') }}"
                        class="bg-green-50 border border-green-200 rounded-lg p-4 hover:bg-green-100 transition group">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-2 rounded-lg group-hover:bg-green-200 transition">
                                <i class="fas fa-user-plus text-green-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-medium text-green-900">Tambah Alumni</h3>
                                <p class="text-sm text-green-600">Tambah data alumni</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.prestasi.create') }}"
                        class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 hover:bg-yellow-100 transition group">
                        <div class="flex items-center">
                            <div class="bg-yellow-100 p-2 rounded-lg group-hover:bg-yellow-200 transition">
                                <i class="fas fa-trophy text-yellow-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-medium text-yellow-900">Tambah Prestasi</h3>
                                <p class="text-sm text-yellow-600">Tambah prestasi</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.ekskul.create') }}"
                        class="bg-purple-50 border border-purple-200 rounded-lg p-4 hover:bg-purple-100 transition group">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-2 rounded-lg group-hover:bg-purple-200 transition">
                                <i class="fas fa-plus-circle text-purple-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-medium text-purple-900">Tambah Ekskul</h3>
                                <p class="text-sm text-purple-600">Tambah ekstrakurikuler</p>
                            </div>
                        </div>
                    </a>
                    @else
                    <!-- Untuk VIEWER yang hanya bisa melihat -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="bg-gray-100 p-2 rounded-lg">
                                <i class="fas fa-eye text-gray-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="font-medium text-gray-900">View Mode</h3>
                                <p class="text-sm text-gray-600">Anda hanya dapat melihat data</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- SUPERADMIN Only Actions -->
                @if(Auth::user()->isSuperadmin())
                <div class="mt-4 pt-4 border-t">
                    <h3 class="text-md font-semibold mb-3 text-gray-700">Superadmin Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('admin.logs.index') }}"
                            class="bg-red-50 border border-red-200 rounded-lg p-4 hover:bg-red-100 transition group">
                            <div class="flex items-center">
                                <div class="bg-red-100 p-2 rounded-lg group-hover:bg-red-200 transition">
                                    <i class="fas fa-history text-red-600"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-red-900">Activity Logs</h3>
                                    <p class="text-sm text-red-600">Lihat semua aktivitas</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                            class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 hover:bg-indigo-100 transition group">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 p-2 rounded-lg group-hover:bg-indigo-200 transition">
                                    <i class="fas fa-users-cog text-indigo-600"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-indigo-900">User Management</h3>
                                    <p class="text-sm text-indigo-600">Kelola pengguna</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Recent Activity (Hanya SUPERADMIN) -->
            @if(Auth::user()->isSuperadmin())
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
                <div class="space-y-3 max-h-96 overflow-y-auto">
                    @forelse($recentLogs as $log)
                    <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50 transition">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-500 text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <span
                                    class="text-sm font-medium text-gray-900">{{ $log->user->username ?? 'System' }}</span>
                                <span class="text-sm text-gray-600 ml-2">{{ $log->description }}</span>
                                <span class="text-xs text-gray-400 block mt-1">
                                    {{ $log->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs rounded-full font-semibold
                            @if($log->action == 'CREATE') bg-green-100 text-green-800 border border-green-200
                            @elseif($log->action == 'UPDATE') bg-blue-100 text-blue-800 border border-blue-200
                            @elseif($log->action == 'DELETE') bg-red-100 text-red-800 border border-red-200
                            @elseif($log->action == 'LOGIN') bg-purple-100 text-purple-800 border border-purple-200
                            @elseif($log->action == 'LOGOUT') bg-gray-100 text-gray-800 border border-gray-200
                            @else bg-yellow-100 text-yellow-800 border border-yellow-200 @endif">
                            {{ $log->action }}
                        </span>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-gray-300 text-4xl mb-3"></i>
                        <p class="text-gray-500">No recent activity</p>
                    </div>
                    @endforelse
                </div>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    let chart = null;
    let visitorUpdateInterval;

    async function fetchVisitorData() {
        try {
            const res = await fetch('{{ route("admin.visitors.api") }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Cache-Control': 'no-cache'
                },
                cache: 'no-cache'
            });

            if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);

            const data = await res.json();
            if (!data.success) throw new Error(data.error || 'API returned error');

            // Update angka di dashboard - REAL TIME
            document.getElementById('totalVisitors').textContent = data.totalVisitors.toLocaleString();
            document.getElementById('activeVisitors').textContent = data.activeVisitors.toLocaleString();
            document.getElementById('todayVisitors').textContent = data.todayVisitors.toLocaleString();

            // Sembunyikan teks loading
            document.getElementById('loadingText').style.display = 'none';

            // Update chart hanya jika data berubah
            updateVisitorChart(data.weeklyVisitors);

        } catch (err) {
            console.error('Error fetching visitor data:', err);
        }
    }

    function updateVisitorChart(weeklyVisitors) {
        const labels = weeklyVisitors.map(v => {
            const date = new Date(v.date);
            return date.toLocaleDateString('id-ID', {
                weekday: 'short',
                day: 'numeric',
                month: 'short'
            });
        });

        const totals = weeklyVisitors.map(v => v.total);

        const ctx = document.getElementById('visitorsChart').getContext('2d');

        // Destroy chart lama jika ada
        if (chart) {
            chart.destroy();
        }

        // Buat chart baru
        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: totals,
                    borderColor: 'rgb(37, 99, 235)',
                    backgroundColor: 'rgba(37, 99, 235, 0.2)',
                    tension: 0.3,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: 'rgb(37, 99, 235)',
                    pointBorderColor: 'white',
                    pointBorderWidth: 2,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        suggestedMax: Math.max(...totals) > 0 ? Math.max(...totals) + 2 : 10
                    }
                },
                layout: {
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            },
        });
    }

    // Real-time update setiap 10 detik
    function startRealTimeUpdates() {
        // Load pertama kali
        fetchVisitorData();

        // Update setiap 5 detik
        visitorUpdateInterval = setInterval(fetchVisitorData, 5000);
    }

    // Stop updates ketika tab tidak aktif (hemat resources)
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            clearInterval(visitorUpdateInterval);
        } else {
            startRealTimeUpdates();
        }
    });

    // Mulai real-time updates ketika page load
    document.addEventListener('DOMContentLoaded', startRealTimeUpdates);

    // Juga update ketika user kembali ke tab ini
    document.addEventListener('focus', fetchVisitorData);
    </script>
</x-admin-layout>
