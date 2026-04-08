<x-layout title="Prestasi - SMK PGRI 3 Malang">
    <div class="h-full container mx-auto px-4 py-6">
        <!-- Hero Section -->
        <!-- ✅ Versi Desktop -->
        <section class="hidden lg:grid w-full container mx-auto py-12 grid-cols-2 gap-10 relative z-10">
            <div class="flex flex-col justify-center space-y-6">
                <div class="flex items-center gap-3 mb-4">
                    <h2 class="text-3xl font-bold leading-tight transition-transform duration-300 transform">
                        SKARIGA, Sekolahnya <br />
                        Sang Juara! <br />
                        Gabung SKARIGA untuk <br />
                        Menjadi <span class="bg-yellow-300 px-1 italic">Sang Juara Selanjutnya!</span>
                    </h2>
                </div>
                <a href="" class="w-max">
                    <button
                        class="w-max bg-customBlue text-white px-6 py-3 rounded-full flex items-center gap-2 transition transform hover:scale-105 hover:bg-customOrange hover:shadow-lg">
                        <span>Daftar Sekarang</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 relative">
                <div class="relative flex justify-end items-center h-[350px] translate-x-56">
                    <!-- Kartu 1 -->
                    <div
                        class="absolute w-80 h-72 bg-gray-400 rounded-xl shadow-xl transition-transform duration-500 transform -translate-x-32 rotate-[-10deg] z-0 hover:z-30 hover:scale-110 hover:-translate-y-4 hover:rotate-0">
                        <div
                            class="absolute -top-4 -left-4 bg-green-400 text-green-900 px-3 py-1 rounded-full text-sm font-bold shadow-lg z-20 cursor-default">
                            🥇 Juara Provinsi
                        </div>
                        <img src="{{ $assetBase . '/assets/robot-manu.jpg' }}" alt="Gambar" loading="lazy"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <!-- Kartu 2 -->
                    <div
                        class="absolute w-80 h-72 bg-gray-500 rounded-xl shadow-xl transition-transform duration-500 transform -translate-y-6 z-10 hover:z-30 hover:scale-110 hover:-translate-y-4 hover:rotate-0">
                        <div
                            class="absolute -top-4 -left-4 bg-sky-400 text-sky-950 px-3 py-1 rounded-full text-sm font-bold shadow-lg z-20 cursor-default">
                            🎗️ Juara Nasional
                        </div>
                        <img src="{{ $assetBase . '/assets/skariga prestasi.jpg' }}" alt="Gambar" loading="lazy"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <!-- Kartu 3 -->
                    <div
                        class="absolute w-80 h-72 bg-black rounded-xl shadow-xl transition-transform duration-500 transform translate-x-32 translate-y-6 rotate-[10deg] z-20 hover:z-30 hover:scale-110 hover:-translate-y-4 hover:rotate-0">
                        <div
                            class="absolute -top-4 -left-4 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-bold shadow-lg z-0 cursor-default">
                            🏆 Juara Internasional
                        </div>
                        <img src="{{ $assetBase . '/assets/skariga intl.webp' }}" alt="Gambar" loading="lazy"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                </div>
            </div>
        </section>

        <!-- ✅ Versi Mobile & Tablet -->
        <section class="lg:hidden w-full py-6 text-center">
            <h2 class="text-xl sm:text-2xl font-bold leading-snug mb-4">
                SKARIGA, Sekolahnya <br />
                Sang Juara! <br />
                Gabung SKARIGA untuk <br />
                Menjadi <span class="bg-yellow-300 px-1 italic">Sang Juara Selanjutnya!</span>
            </h2>
            <div class="flex justify-center mb-6">
                <button
                    class="bg-customBlue text-white px-5 py-2 rounded-full flex items-center gap-2 transition transform hover:scale-105 hover:bg-customOrange hover:shadow-lg text-sm sm:text-base">
                    <span>Daftar Sekarang</span>
                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Grid Compact untuk Kartu Prestasi -->
            <div class="grid grid-cols-1 gap-4 max-w-md mx-auto">
                <!-- Kartu 1 - Juara Provinsi -->
                <div class="bg-gray-400 rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-green-400 text-green-900 px-3 py-1 text-sm font-bold text-center">
                        🥇 Juara Provinsi
                    </div>
                    <img src="{{ $assetBase . '/assets/robot-manu.jpg' }}" class="w-full h-48 object-cover"
                        alt="Juara Provinsi" loading="lazy">
                </div>

                <!-- Kartu 2 - Juara Nasional -->
                <div class="bg-gray-500 rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-sky-400 text-sky-950 px-3 py-1 text-sm font-bold text-center">
                        🎗️ Juara Nasional
                    </div>
                    <img src="{{ $assetBase . '/assets/skariga prestasi.jpg' }}" class="w-full h-48 object-cover"
                        alt="Juara Nasional" loading="lazy">
                </div>

                <!-- Kartu 3 - Juara Internasional -->
                <div class="bg-black rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-yellow-400 text-yellow-900 px-3 py-1 text-sm font-bold text-center">
                        🏆 Juara Internasional
                    </div>
                    <img src="{{ $assetBase . '/assets/skariga intl.webp' }}" class="w-full h-48 object-cover"
                        alt="Juara Internasional" loading="lazy">
                </div>
            </div>
        </section>

        <!-- ✅ Section Stats -->
        <section class="w-full mx-auto py-8">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                <div class="bg-gray-300/50 rounded-xl p-4 sm:p-6 text-center shadow-md">
                    <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-1 sm:mb-2">{{ $totalPrestasi }}+
                    </div>
                    <div class="text-gray-600 text-sm sm:text-base">Prestasi</div>
                </div>
                <div class="bg-gray-300/50 rounded-xl p-4 sm:p-6 text-center shadow-md">
                    <div class="text-2xl sm:text-3xl font-bold text-green-600 mb-1 sm:mb-2">
                        {{ $totalPrestasi * 2 }}+</div>
                    <div class="text-gray-600 text-sm sm:text-base">Siswa Berprestasi</div>
                </div>
                <div class="bg-gray-300/50 rounded-xl p-4 sm:p-6 text-center shadow-md">
                    <div class="text-2xl sm:text-3xl font-bold text-orange-600 mb-1 sm:mb-2">10+</div>
                    <div class="text-gray-600 text-sm sm:text-base">Bidang Lomba</div>
                </div>
                <div class="bg-gray-300/50 rounded-xl p-4 sm:p-6 text-center shadow-md">
                    <div class="text-2xl sm:text-3xl font-bold text-purple-600 mb-1 sm:mb-2">5+</div>
                    <div class="text-gray-600 text-sm sm:text-base">Tahun Berprestasi</div>
                </div>
            </div>
        </section>

        <!-- ✅ Section Para Jawara dengan AJAX -->
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8" id="prestasi-container">
            <div class="w-full mx-auto py-8">
                <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 mb-6 relative">
                    <div
                        class="bg-gray-100 rounded-xl shadow-lg px-4 sm:px-6 py-3 sm:py-4 grid grid-cols-3 items-center mb-6">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-red-500"></span>
                            <span class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-yellow-500"></span>
                            <span class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-green-500"></span>
                        </div>
                        <div class="flex items-center justify-center">
                            <h2 class="text-4xl sm:text-5xl font-bold text-center"
                                style="text-shadow: 2px 2px 5px #FFD700;">
                                PARA JAWARA
                            </h2>
                        </div>
                        <img src="{{ $assetBase . '/assets/troph-pres.png' }}"
                            class="w-20 h-20 sm:w-28 sm:h-28 drop-shadow-md transform scale-125 -rotate-12 ml-3"
                            alt="Gambar" loading="lazy">
                        <div></div>
                        <div></div>
                    </div>

                    <!-- Container untuk konten prestasi yang akan di-update via AJAX -->
                    <div id="prestasi-content">
                        <!-- Grid container dengan data dari database -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="prestasi-grid">
                            @foreach ($prestasis as $prestasi)
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <img src="{{ $prestasi->gambar ? $assetBase . '/storage/' . $prestasi->gambar : $assetBase . '/assets/default.svg' }}"
                                    class="w-full h-64 object-cover rounded-lg mb-4" alt="{{ $prestasi->nama }}">
                                <p class="font-semibold">{{ $prestasi->nama }}</p>
                                <p class="text-gray-500 text-sm">{{ $prestasi->subjudul }}</p>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination Links -->
                        <div class="flex justify-center mt-6" id="pagination-links">
                            {{ $prestasis->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const prestasiContent = document.getElementById('prestasi-content');
            const loadingIndicator = document.getElementById('loading');
            const prestasiContainer = document.getElementById('prestasi-container');
            
            function loadPage(url) {
                // Show loading
                loadingIndicator.classList.remove('hidden');
                prestasiContent.classList.add('opacity-50');
                
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(html => {
                    // Create temporary container to parse HTML
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    
                    // Extract hanya bagian prestasi-content dari response
                    const newPrestasiContent = tempDiv.querySelector('#prestasi-content');
                    
                    if (newPrestasiContent) {
                        // Replace content
                        prestasiContent.innerHTML = newPrestasiContent.innerHTML;
                        
                        // Update URL tanpa refresh
                        window.history.pushState({}, '', url);
                        
                        // Scroll ke bagian prestasi dengan smooth animation
                        setTimeout(() => {
                            prestasiContainer.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 100);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Fallback: redirect ke halaman normal
                    window.location.href = url;
                })
                .finally(() => {
                    loadingIndicator.classList.add('hidden');
                    prestasiContent.classList.remove('opacity-50');
                });
            }
            
            // Event delegation untuk pagination links
            document.addEventListener('click', function(e) {
                const paginationLink = e.target.closest('.pagination a, a[href*="page"]');
                
                if (paginationLink) {
                    e.preventDefault();
                    const url = paginationLink.href;
                    loadPage(url);
                }
            });
            
            // Handle browser back/forward buttons
            window.addEventListener('popstate', function() {
                loadPage(window.location.href);
            });
        });
    </script>
</x-layout>