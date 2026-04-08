@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 auto-rows-[180px] sm:auto-rows-[200px] lg:auto-rows-[220px] gap-4 sm:gap-5 lg:gap-6 p-3 sm:p-4 lg:p-6 select-none">

        <!-- Total Users -->
        <div
            class="lg:col-span-2 bg-white/70 backdrop-blur-lg rounded-2xl shadow-lg p-5 flex flex-col justify-between hover:shadow-blue-200/50 hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
                    <h2 class="text-4xl font-bold text-gray-800 mt-2 tracking-tight">{{ $userCount }}</h2>
                </div>
                <div class="w-10 h-10 bg-blue-500/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-3 text-sm text-gray-400">+2% dibanding minggu lalu</div>
        </div>

        <!-- Total Assets -->
        <div
            class="lg:col-span-2 bg-white/70 backdrop-blur-lg rounded-2xl shadow-lg p-5 flex flex-col justify-between hover:shadow-emerald-200/50 hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Assets</h3>
                    <h2 class="text-4xl font-bold text-gray-800 mt-2 tracking-tight">{{ $assetCount }}</h2>
                </div>
                <div class="w-10 h-10 bg-emerald-500/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-images text-emerald-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-3 text-sm text-gray-400">Stabil dalam 7 hari terakhir</div>
        </div>

        <!-- Total Konten -->
        <div
            class="lg:col-span-2 bg-gradient-to-br from-blue-500/80 to-pink-500/80 text-white rounded-2xl shadow-lg p-5 flex flex-col justify-between hover:shadow-pink-200/40 hover:-translate-y-1 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-white/80 text-sm font-medium">Total Konten</h3>
                    <h2 class="text-4xl font-bold mt-2 tracking-tight">{{ $contentCount }}</h2>
                </div>
                <div class="w-10 h-10 bg-white/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-file-alt text-white text-xl"></i>
                </div>
            </div>
            <div class="mt-3 text-sm text-white/70">+8 artikel baru minggu ini</div>
        </div>
    </div>

    <!-- Bagian bawah -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-3 sm:p-4 lg:p-6">

        <!-- Statistik Pengunjung -->
        <div
            class="lg:col-span-2 bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg p-6 hover:shadow-blue-200/40 transition-all duration-300">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-gray-700 font-semibold text-lg flex items-center gap-2">
                    Statistik Pengunjung
                    <span id="live-indicator" class="text-sm text-emerald-500">Server APIs Connected</span>
                </h2>
            </div>
            <div class="w-full h-[340px] overflow-hidden">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>

        <!-- Aktivitas Log Admin -->
        <div
            class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg p-6 hover:shadow-emerald-200/40 transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-gray-700 font-semibold text-lg flex items-center gap-2">
                    <i class="fas fa-history text-emerald-600"></i> Aktivitas Log Admin
                </h2>

                <!-- Filter tipe aktivitas -->
                <form method="GET" action="{{ route('admin.dashboard') }}">
                    <select name="filter" onchange="this.form.submit()"
                        class="text-sm border border-gray-300 rounded-lg px-3 py-1 text-gray-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white/50">
                        <option value="">Semua</option>
                        <option value="Login" {{ request('filter') == 'Login' ? 'selected' : '' }}>Login</option>
                        <option value="Tambah Data" {{ request('filter') == 'Tambah Data' ? 'selected' : '' }}>Tambah Data
                        </option>
                        <option value="Edit Data" {{ request('filter') == 'Edit Data' ? 'selected' : '' }}>Edit Data</option>
                        <option value="Hapus Data" {{ request('filter') == 'Hapus Data' ? 'selected' : '' }}>Hapus Data</option>
                    </select>
                </form>
            </div>

            <div class="space-y-3 max-h-[360px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300">
                @forelse($adminLogs as $log)
                    <div class="flex items-start gap-3 border-b border-gray-100 pb-2">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-user-cog text-emerald-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 text-sm font-medium">{{ $log->admin_name }}</p>
                            <p class="text-gray-500 text-xs">{{ $log->activity }}</p>
                            <span class="text-[10px] text-gray-400">{{ $log->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-400 text-sm">Belum ada aktivitas terbaru.</p>
                @endforelse
            </div>

            <!-- Custom Pagination -->
            @if ($adminLogs->hasPages())
                <div class="mt-4 pt-4 border-t border-gray-200/60">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                        <!-- Pagination Info -->
                        <div class="text-xs text-gray-600">
                            Menampilkan
                            <span
                                class="font-medium">{{ ($adminLogs->currentPage() - 1) * $adminLogs->perPage() + 1 }}</span>-
                            <span
                                class="font-medium">{{ min($adminLogs->currentPage() * $adminLogs->perPage(), $adminLogs->total()) }}</span>
                            dari
                            <span class="font-medium">{{ $adminLogs->total() }}</span> aktivitas
                        </div>

                        <!-- Pagination Links -->
                        <div class="flex items-center gap-1">
                            <!-- Previous Button -->
                            @if ($adminLogs->onFirstPage())
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-left text-xs"></i>
                                </span>
                            @else
                                <a href="{{ $adminLogs->previousPageUrl() }}"
                                    class="inline-flex items-center justify-center w-8 h-8 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200 group">
                                    <i
                                        class="fas fa-chevron-left text-xs group-hover:-translate-x-0.5 transition-transform"></i>
                                </a>
                            @endif

                            <!-- Page Numbers - Compact -->
                            <div class="flex items-center gap-1">
                                @php
                                    $current = $adminLogs->currentPage();
                                    $last = $adminLogs->lastPage();

                                    // Show limited page numbers for compact design
                                    $start = max(1, $current - 1);
                                    $end = min($last, $current + 1);

                                    // Always show first page if not in range
                                    if ($start > 1) {
                                        echo '<a href="' .
                                            $adminLogs->url(1) .
                                            '" class="w-8 h-8 flex items-center justify-center text-xs font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">1</a>';
                                        if ($start > 2) {
                                            echo '<span class="w-8 h-8 flex items-center justify-center text-xs text-gray-400">...</span>';
                                        }
                                    }

                                    // Show current page and neighbors
                                    for ($i = $start; $i <= $end; $i++) {
                                        if ($i == $current) {
                                            echo '<span class="w-8 h-8 flex items-center justify-center text-xs font-medium text-white bg-gradient-to-r from-emerald-500 to-green-500 rounded-lg shadow-sm">' .
                                                $i .
                                                '</span>';
                                        } else {
                                            echo '<a href="' .
                                                $adminLogs->url($i) .
                                                '" class="w-8 h-8 flex items-center justify-center text-xs font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">' .
                                                $i .
                                                '</a>';
                                        }
                                    }

                                    // Always show last page if not in range
                                    if ($end < $last) {
                                        if ($end < $last - 1) {
                                            echo '<span class="w-8 h-8 flex items-center justify-center text-xs text-gray-400">...</span>';
                                        }
                                        echo '<a href="' .
                                            $adminLogs->url($last) .
                                            '" class="w-8 h-8 flex items-center justify-center text-xs font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">' .
                                            $last .
                                            '</a>';
                                    }
                                @endphp
                            </div>

                            <!-- Next Button -->
                            @if ($adminLogs->hasMorePages())
                                <a href="{{ $adminLogs->nextPageUrl() }}"
                                    class="inline-flex items-center justify-center w-8 h-8 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200 group">
                                    <i
                                        class="fas fa-chevron-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
                                </a>
                            @else
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        import {
            initVisitorChart
        } from "/js/apis.js";
        initVisitorChart("{{ route('admin.visitor.stats') }}", @json($labels), @json($data));
    </script>

    <style>
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endsection
