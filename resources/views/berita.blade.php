<x-layout title="Berita - SMK PGRI 3 Malang">
    <div class="bg-[#F8F8F8]">
        <section class="bg-gradient-to-r from-custombbg-customBlue text-white py-12">
            <div class="container mx-auto px-4 py-4">
                <div class="max-w-1xl">
                    <h1 class="text-4xl font-bold mb-4 text-gray-700">Berita Terkini SKARIGA</h1>
                    <p class="text-lg text-gray-500">Ikuti perkembangan terbaru seputar kegiatan, prestasi, dan
                        informasi penting
                        dari SMK PGRI 3 Malang.</p>
                </div>
            </div>
        </section>

        <div class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300 ease-in-out"
            id="sidebarOverlay"></div>

        <div class="sidebar fixed top-0 right-[-100%] w-1/2 h-full bg-white z-50 overflow-y-auto transition-right duration-300 ease-in-out shadow-2xl"
            id="newsSidebar">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10 transition-colors"
                id="closeSidebar">
                <i class="fas fa-times text-xl"></i>
            </button>

            <div class="p-6 pt-12">
                <img id="sidebarImage" src="" alt="" class="w-full h-64 object-cover rounded-xl mb-6">

                <h2 id="sidebarTitle" class="text-2xl font-bold text-custombbg-customBlue mb-4"></h2>

                <div class="flex items-center text-sm text-gray-500 mb-6">
                    <span class="mr-4"><i class="far fa-calendar-alt mr-1"></i> <span id="sidebarDate"></span></span>
                    <span><i class="far fa-eye mr-1"></i> <span id="sidebarViews"></span> dilihat</span>
                </div>

                <div id="sidebarContent" class="text-gray-700 leading-relaxed whitespace-pre-line mb-8"></div>

            </div>
        </div>

        <main class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap justify-between items-center mb-8 bg-white p-4 rounded-lg shadow">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-xl font-bold text-customBlue">Kumpulan Berita</h2>
                    <p class="text-gray-600">Temukan informasi terbaru dari sekolah</p>
                </div>

                <div class="flex flex-wrap gap-2" id="filterButtons">
                    <button
                        class="filter-btn {{ $type === 'all' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        data-type="all">Semua</button>
                    <button
                        class="filter-btn {{ $type === 'prestasi' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        data-type="prestasi">Prestasi</button>
                    <button
                        class="filter-btn {{ $type === 'kegiatan' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        data-type="kegiatan">Kegiatan</button>
                    <button
                        class="filter-btn {{ $type === 'pengumuman' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        data-type="pengumuman">Pengumuman</button>
                    <button
                        class="filter-btn {{ $type === 'acara' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                        data-type="acara">Acara</button>
                </div>

                <div id="loadingIndicator" class="hidden justify-center items-center py-12 w-full">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-customBlue"></div>
                    <span class="ml-3 text-gray-600">Memuat berita...</span>
                </div>
            </div>

            <div id="berita-content" class="transition-opacity duration-300">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 items-stretch" id="newsGrid">
                    @foreach ($beritas as $berita)
                        <div class="news-card bg-white rounded-xl shadow-md overflow-hidden flex flex-col h-full"
                            data-type="{{ strtolower($berita->type) }}">
                            <div class="relative">
                                <img src="{{ !is_null($berita->gambar) ? $assetBase . '/storage/' . $berita->gambar : 'https://placehold.co/600x400' }}"
                                    alt="{{ $berita->title }}" class="w-full h-48 object-cover">
                                <div class="absolute top-4 left-4">
                                    <span class="bg-customOrange text-white px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $berita->type }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex justify-between text-sm text-gray-500 mb-2">
                                    <span><i class="far fa-calendar-alt mr-1"></i>
                                        {{ $berita->created_at->format('d M Y') }}</span>
                                    <span><i class="far fa-eye mr-1"></i> {{ $berita->views }}</span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-800 mb-3 break-words line-clamp-2 min-h-[56px]">
                                    {{ $berita->title }}
                                </h3>

                                <p class="text-gray-600 mb-4 break-words line-clamp-3 min-h-[72px]">
                                    {{ Str::limit($berita->deskripsi, 120) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="inline-block bg-customBlue hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all self-start">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-8 space-x-2" id="pagination-container">
                    {{ $beritas->links('pagination::tailwind') }}
                </div>

            </div>
        </main>
    </div>

    <script>
        // 1. Script Filter Kategori Berita
        document.addEventListener('DOMContentLoaded', () => {
            const filterButtons = document.querySelectorAll('.filter-btn');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const type = button.getAttribute('data-type');

                    filterButtons.forEach(btn => btn.classList.remove('bg-customBlue',
                        'text-white'));
                    button.classList.add('bg-customBlue', 'text-white');

                    // Ambil ulang elemen agar terbaca setelah halaman berganti via AJAX
                    const currentNewsCards = document.querySelectorAll(
                    '#berita-content .news-card');

                    currentNewsCards.forEach(card => {
                        const cardType = card.getAttribute('data-type');
                        if (type === 'all' || cardType === type) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>

    <script>
        // 2. Script Bawaan Sidebar
        function openSidebar(image, title, date, views, content) {
            document.getElementById('sidebarImage').src = image;
            document.getElementById('sidebarTitle').textContent = title;
            document.getElementById('sidebarDate').textContent = date;
            document.getElementById('sidebarViews').textContent = views;
            document.getElementById('sidebarContent').textContent = content;

            document.getElementById('sidebarOverlay').classList.add('active');
            document.getElementById('newsSidebar').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            document.getElementById('sidebarOverlay').classList.remove('active');
            document.getElementById('newsSidebar').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                const button = e.target.closest('.read-more-btn');
                if (button) {
                    const image = button.getAttribute('data-image');
                    const title = button.getAttribute('data-title');
                    const date = button.getAttribute('data-date');
                    const views = button.getAttribute('data-views');
                    const content = button.getAttribute('data-content');

                    openSidebar(image, title, date, views, content);
                }
            });

            document.getElementById('closeSidebar').addEventListener('click', closeSidebar);
            document.getElementById('sidebarOverlay').addEventListener('click', closeSidebar);

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') closeSidebar();
            });
        });
    </script>

    <script>
        // 3. Script AJAX Pagination (Disempurnakan dari versi Prestasi)
        document.addEventListener('DOMContentLoaded', function() {
            const beritaContent = document.getElementById('berita-content');
            const loadingIndicator = document.getElementById('loadingIndicator');

            function loadPage(url) {
                // Tampilkan animasi loading
                loadingIndicator.classList.remove('hidden');
                loadingIndicator.classList.add('flex');
                beritaContent.classList.add('opacity-50');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response error');
                        return response.text();
                    })
                    .then(html => {
                        // Gunakan DOMParser agar struktur HTML aman dari pemotongan (mencegah fallback refresh)
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newBeritaContent = doc.querySelector('#berita-content');

                        if (newBeritaContent) {
                            // Timpa konten lama dengan konten halaman baru
                            beritaContent.innerHTML = newBeritaContent.innerHTML;

                            // Update URL di address bar tanpa refresh
                            window.history.pushState({}, '', url);

                            // Panggil fungsi untuk mempertahankan filter kategori
                            applyActiveFilter();

                            // Scroll kembali ke atas dengan halus
                            setTimeout(() => {
                                const filterSection = document.querySelector(
                                    '.flex.flex-wrap.justify-between.items-center.mb-8.bg-white');
                                if (filterSection) {
                                    filterSection.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                }
                            }, 100);
                        } else {
                            throw new Error('ID #berita-content tidak ditemukan di response');
                        }
                    })
                    .catch(error => {
                        console.error('AJAX Error:', error);
                        // Jika AJAX gagal karena alasan apapun, sistem akan memuat halaman secara normal
                        window.location.href = url;
                    })
                    .finally(() => {
                        // Sembunyikan loading
                        loadingIndicator.classList.add('hidden');
                        loadingIndicator.classList.remove('flex');
                        beritaContent.classList.remove('opacity-50');
                    });
            }

            // Fungsi khusus untuk memastikan kartu berita sesuai dengan filter yang aktif
            function applyActiveFilter() {
                const activeFilterBtn = document.querySelector('.filter-btn.bg-customBlue');
                if (activeFilterBtn) {
                    const activeType = activeFilterBtn.getAttribute('data-type');
                    const newCards = document.querySelectorAll('#berita-content .news-card');

                    newCards.forEach(card => {
                        if (activeType === 'all' || card.getAttribute('data-type') === activeType) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
            }

            // Penangkapan klik yang lebih presisi khusus area Pagination
            document.addEventListener('click', function(e) {
                // Cek dulu apakah user benar-benar mengklik area di dalam container pagination
                const paginationContainer = e.target.closest('#pagination-container');

                if (paginationContainer) {
                    // Jika iya, cari tag <a> nya (berjaga-jaga jika user klik angka di dalam tag span)
                    const link = e.target.closest('a');

                    if (link && link.href) {
                        e.preventDefault(); // Matikan refresh bawaan browser
                        loadPage(link.href); // Mulai proses AJAX
                    }
                }
            });

            // Tangani tombol Back / Forward di browser agar tidak rusak
            window.addEventListener('popstate', function() {
                loadPage(window.location.href);
            });
        });
    </script>
</x-layout>
