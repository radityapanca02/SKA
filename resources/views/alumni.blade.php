<x-layout title="Alumni - SMK PGRI 3 Malang">
    <div class="container mx-auto px-4 py-6">
        <section class="w-full relative h-[550px] md:h-[600px] lg:h-[700px] mt-2 rounded-xl overflow-hidden">
            <div class="absolute inset-0 max-w-full mx-auto h-full hover-scale rounded-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/5 to-black/70"></div>
                <img src="{{ $assetBase . '/assets/alumni.png' }}" alt="Hero SKARIGA" loading="lazy"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            </div>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] inset-x-4">
                <div class="mb-4 h-2 md:h-3 relative max-w-full mx-auto bg-white/40 rounded-full">
                    <div class="h-full bg-white rounded-full" style="width:40%"></div>
                    <div class="absolute bottom-4 inset-x-4 md:inset-x-12 lg:inset-x-24">
                    </div>
                </div>

                <div class="flex justify-center items-center space-x-4 md:space-x-6 text-xl md:text-2xl">
                    <button class="p-2 md:p-3 text-white rounded-full hover:bg-white/20 transition"><i
                            class="fa-solid fa-shuffle"></i></button>
                    <button class="p-2 md:p-3 text-white rounded-full hover:bg-white/20 transition"><i
                            class="fa-solid fa-backward-step"></i></button>
                    <button
                        class="p-3 md:p-4 rounded-full bg-orange-500 text-white shadow-lg hover:bg-orange-600 transition"><i
                            class="fa-solid fa-pause"></i></button>
                    <button class="p-2 md:p-3 text-white rounded-full hover:bg-white/20 transition"><i
                            class="fa-solid fa-forward-step"></i></button>
                    <button class="p-2 md:p-3 text-white rounded-full hover:bg-white/20 transition"><i
                            class="fa-solid fa-repeat"></i></button>
                </div>
            </div>
        </section>

        <section class="py-12 md:py-16 animate-fade-in" id="alumni-section">
            <div class="max-w-full container mx-auto">
                <h2 class="text-3xl md:text-5xl font-bold text-center mb-4 text-gray-800">ALUMNI HEBAT!</h2>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Alumni-alumni berprestasi SMK PGRI 3 MALANG
                    yang telah sukses di dunia kerja</p>

                <div id="loading" class="hidden justify-center items-center py-8 w-full">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-customBlue"></div>
                    <span class="ml-3 text-gray-600 font-medium">Memuat data alumni...</span>
                </div>

                <div id="alumni-content" class="transition-opacity duration-300">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch" id="alumni-grid">
                        @foreach($alumnis as $alumni)
                            <div
                                class="alumni-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 h-full flex flex-col">
                                <div class="relative h-40 bg-gradient-to-r {{ $alumni->bg_color ?? 'bg-blue-500' }}">
                                    <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                        <img src="{{ !empty($alumni->image) ? $assetBase . '/storage/' . $alumni->image : 'https://placehold.co/600x400' }}"
                                            alt="{{ $alumni->name }}" loading="lazy"
                                            class="alumni-image w-24 h-24 rounded-full object-cover">
                                    </div>
                                </div>

                                <div class="pt-16 pb-6 px-6 text-center flex flex-col flex-1">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $alumni->name }}</h3>
                                    <p class="text-sm text-gray-600 mb-2">Lulusan {{ $alumni->graduation }}</p>

                                    <div class="flex justify-center mb-4">
                                        <div
                                            class="bg-gradient-to-r {{ $alumni->bg_color ?? 'bg-blue-500' }} text-white py-2 px-5 rounded-full w-auto inline-block">
                                            <p class="text-sm font-semibold whitespace-nowrap">{{ $alumni->position }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-center mb-3 text-gray-700">
                                        <i class="fas fa-building text-sm mr-2"></i>
                                        <p class="text-sm font-medium">{{ $alumni->company }}</p>
                                    </div>

                                    <p class="text-gray-600 text-sm mb-4 leading-relaxed flex-1">{{ $alumni->description }}
                                    </p>

                                    <div class="border-t border-gray-100 pt-4 mt-auto">
                                        <p class="text-xs font-semibold text-gray-500 mb-2">PRESTASI / PENGHARGAAN:</p>
                                        <div class="flex flex-wrap justify-center gap-2">
                                            @if(!empty($alumni->achievements) && is_array($alumni->achievements) && count($alumni->achievements) > 0)
                                                @foreach($alumni->achievements as $achievement)
                                                    <span
                                                        class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">{{ $achievement }}</span>
                                                @endforeach
                                            @else
                                                <span class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">Tidak ada
                                                    data spesifik</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($alumnis->hasPages())
                        <div class="flex justify-center mt-12 space-x-2" id="pagination-controls">
                            {{ $alumnis->links('pagination::tailwind') }}
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alumniContent = document.getElementById('alumni-content');
            const loadingIndicator = document.getElementById('loading');
            const alumniSection = document.getElementById('alumni-section');

            function loadPage(url) {
                // Tampilkan loading
                loadingIndicator.classList.remove('hidden');
                loadingIndicator.classList.add('flex');
                alumniContent.classList.add('opacity-50');

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
                        // Gunakan DOMParser agar aman dari pemotongan HTML (seperti di kasus berita)
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newAlumniContent = doc.querySelector('#alumni-content');

                        if (newAlumniContent) {
                            // Ganti konten
                            alumniContent.innerHTML = newAlumniContent.innerHTML;

                            // Update URL tanpa refresh halaman
                            window.history.pushState({}, '', url);

                            // Geser layar ke atas area alumni dengan mulus
                            setTimeout(() => {
                                alumniSection.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }, 100);
                        } else {
                            throw new Error('ID #alumni-content tidak ditemukan!');
                        }
                    })
                    .catch(error => {
                        console.error('AJAX Error:', error);
                        // Fallback: Jika AJAX gagal, muat halaman seperti biasa (refresh)
                        window.location.href = url;
                    })
                    .finally(() => {
                        // Sembunyikan loading
                        loadingIndicator.classList.add('hidden');
                        loadingIndicator.classList.remove('flex');
                        alumniContent.classList.remove('opacity-50');
                    });
            }

            // Event listener khusus untuk tombol pagination
            document.addEventListener('click', function (e) {
                const paginationLink = e.target.closest('#pagination-controls a, .pagination a, a[href*="page"]');

                if (paginationLink && paginationLink.closest('#alumni-content')) {
                    e.preventDefault();
                    const url = paginationLink.href;
                    loadPage(url);
                }
            });

            // Tangani tombol back/forward di browser
            window.addEventListener('popstate', function () {
                loadPage(window.location.href);
            });
        });
    </script>
</x-layout>
