<x-layout title="Berita - SMK PGRI 3 Malang">
    <div class="bg-gray-50">
        <section class="bg-gradient-to-r from-custombbg-customBlue text-white py-12">
            <div class="container mx-auto px-4 py-4">
                <div class="max-w-1xl">
                    <h1 class="text-4xl font-bold mb-4 text-gray-700">Berita Terkini Skariga</h1>
                    <p class="text-lg text-gray-500">Ikuti perkembangan terbaru seputar kegiatan, prestasi, dan
                        informasi penting
                        dari SMK PGRI 3 Malang.</p>
                    {{-- <div class="flex space-x-4">
                        <button
                            class="bg-customOrange hover:b text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-newspaper mr-2"></i>Semua Berita
                        </button>
                        {{-- <button
                            class="bg-white text-customBlue hover:bg-gray-100 px-6 py-2 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-calendar-alt mr-2"></i>Kalender Akademik
                        </button>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Sidebar untuk Detail Berita -->
        <div class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300 ease-in-out"
            id="sidebarOverlay"></div>

        <div class="sidebar fixed top-0 right-[-100%] w-1/2 h-full bg-white z-50 overflow-y-auto transition-right duration-300 ease-in-out shadow-2xl"
            id="newsSidebar">
            <!-- Tombol Close -->
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10 transition-colors"
                id="closeSidebar">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Konten Sidebar -->
            <div class="p-6 pt-12">
                <!-- Gambar -->
                <img id="sidebarImage" src="" alt="" class="w-full h-64 object-cover rounded-xl mb-6">

                <!-- Judul -->
                <h2 id="sidebarTitle" class="text-2xl font-bold text-custombbg-customBlue mb-4"></h2>

                <!-- Info tambahan -->
                <div class="flex items-center text-sm text-gray-500 mb-6">
                    <span class="mr-4"><i class="far fa-calendar-alt mr-1"></i> <span id="sidebarDate"></span></span>
                    <span><i class="far fa-eye mr-1"></i> <span id="sidebarViews"></span> dilihat</span>
                </div>

                <!-- Konten -->
                <div id="sidebarContent" class="text-gray-700 leading-relaxed whitespace-pre-line mb-8"></div>

            </div>
        </div>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <!-- Filter Section -->
            <div class="flex flex-wrap justify-between items-center mb-8 bg-white p-4 rounded-lg shadow">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-xl font-bold text-customBlue">Kumpulan Berita</h2>
                    <p class="text-gray-600">Temukan informasi terbaru dari sekolah</p>
                </div>
                <div class="flex flex-wrap justify-between items-center mb-8 bg-white p-4 rounded-lg shadow">

                    <div class="flex flex-wrap gap-2" id="filterButtons">
                        <button
                            class="filter-btn {{ $type === 'all' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            data-type="all">
                            Semua
                        </button>
                        <button
                            class="filter-btn {{ $type === 'prestasi' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            data-type="prestasi">
                            Prestasi
                        </button>
                        <button
                            class="filter-btn {{ $type === 'kegiatan' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            data-type="kegiatan">
                            Kegiatan
                        </button>
                        <button
                            class="filter-btn {{ $type === 'pengumuman' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            data-type="pengumuman">
                            Pengumuman
                        </button>
                        <button
                            class="filter-btn {{ $type === 'acara' ? 'bg-customBlue text-white' : 'hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            data-type="acara">
                            Acara
                        </button>
                    </div>
                </div>

                <!-- Loading Indicator -->
                <div id="loadingIndicator" class="hidden justify-center items-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-customBlue"></div>
                    <span class="ml-3 text-gray-600">Memuat berita...</span>
                </div>
            </div>

            <!-- News Grid -->
            {{--  --}}
            <!-- Di dalam grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 items-stretch" id="newsGrid">
                @foreach ($beritas as $berita)
                <div class="news-card bg-white rounded-xl shadow-md overflow-hidden flex flex-col h-full"
                    data-type="{{ strtolower($berita->type) }}">
                    <div class="relative">
                        <img src="{{ $assetBase . '/storage/' . $berita->gambar }}" alt="{{ $berita->title }}"
                            class="w-full h-48 object-cover">
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
    </div>
    <!-- Pagination -->
    <div class="flex justify-center mt-8 space-x-2" id="pagination-container">
        {{ $beritas->links('pagination::tailwind') }}
    </div>

    </main>
    </div>

    <style>
    /* Custom styles untuk sidebar responsif */
    @media (max-width: 768px) {
        .sidebar {
            width: 85% !important;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 95% !important;
        }
    }

    .sidebar.active {
        right: 0 !important;
    }

    .sidebar-overlay.active {
        opacity: 1 !important;
        visibility: visible !important;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const newsCards = document.querySelectorAll('.news-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const type = button.getAttribute('data-type');

                filterButtons.forEach(btn => btn.classList.remove('bg-customBlue',
                    'text-white'));
                button.classList.add('bg-customBlue', 'text-white');

                newsCards.forEach(card => {
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
        document.querySelectorAll('.read-more-btn').forEach(button => {
            button.addEventListener('click', function() {
                const image = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                const date = this.getAttribute('data-date');
                const views = this.getAttribute('data-views');
                const content = this.getAttribute('data-content');

                openSidebar(image, title, date, views, content);
            });
        });

        document.getElementById('closeSidebar').addEventListener('click', closeSidebar);

        document.getElementById('sidebarOverlay').addEventListener('click', closeSidebar);

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });
    });
    </script>
</x-layout>
