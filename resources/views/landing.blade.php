<x-layout title="SMK PGRI 3 Malang - Success by Discipline">
    <script>
    // Optimasi: Data transfer lebih efisien
    window.beritas = @json($beritas->take(4));
    </script>

    <!-- Main content with news sidebar -->
    <div class="flex flex-col lg:flex-row container mx-auto px-4 py-6">
        <!-- Main content -->
        <main class="w-full lg:w-3/4">
            <!-- Hero Section - Lazy load swiper -->
            <section class="relative w-full overflow-hidden rounded-xl mb-8" x-data="{ swiperLoaded: false }">
                <div class="swiper mySwiper rounded-xl overflow-hidden"
                     x-init="setTimeout(() => swiperLoaded = true, 100)">
                    <div class="swiper-wrapper" id="x-headnews"></div>
                    <div class="swiper-button-prev text-white sm:text-transparent" style="color: white;"></div>
                    <div class="swiper-button-next text-white sm:text-transparent" style="color: white;"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!-- Marquee -->
            <x-marquee />

            <!-- Department Sections - Optimized images & reduced animations -->
            <section class="py-8 md:py-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">

                    @foreach([
                        [
                            'bg' => 'bg-customOrange',
                            'title' => 'Elektro',
                            'image' => 'elektro_card.webp',
                            'bg_image' => 'bg_elektro_card.png',
                            'desc' => 'Departemen Elektronika mempelajari dasar-dasar rangkaian listrik, komponen elektronik, dan sistem digital. Juga mencakup perakitan, pemrograman mikrokontroller, serta pengendalian otomatis.'
                        ],
                        [
                            'bg' => 'bg-customRed',
                            'title' => 'Otomotif',
                            'image' => 'otomotif_card.webp',
                            'bg_image' => 'bg_otomotif_card.png',
                            'desc' => 'Departemen Otomotif mempelajari teori sistem kendaraan seperti mesin, transmisi, kelistrikan, bodi, dan suspensi. Praktiknya dilakukan di bengkel bersama guru pengajar.'
                        ],
                        [
                            'bg' => 'bg-customPink',
                            'title' => 'Pemesinan',
                            'image' => 'pemesinan_card.webp',
                            'bg_image' => 'bg_pemesinan_card.png',
                            'desc' => 'Departemen Pemesinan mempelajari teknik pengoperasian mesin produksi seperti bubut, frais, dan CNC. Juga mencakup gambar teknik serta kontrol kualitas produk.',
                            'image_class' => 'object-[center_20%]'
                        ],
                        [
                            'bg' => 'bg-customBlue',
                            'title' => 'TIK',
                            'image' => 'tik_card.webp',
                            'bg_image' => 'bg_tik_card.png',
                            'desc' => 'Departemen TIK mempelajari pemrograman, jaringan komputer, teknologi digital, dan kecerdasan buatan. Siswa juga belajar manajemen proyek TI dan etika teknologi.'
                        ]
                    ] as $dept)
                    <div class="{{ $dept['bg'] }} p-4 md:p-5 rounded-xl relative overflow-hidden flex flex-col justify-between transition-all duration-200 hover:shadow-lg">
                        <div class="bg-white p-2 mb-4 rounded-lg">
                            <img
                                class="w-full object-cover max-h-56 rounded-lg {{ $dept['image_class'] ?? '' }}"
                                src="{{ $assetBase }}/assets/{{ $dept['image'] }}"
                                alt="{{ $dept['title'] }} Department"
                                loading="lazy"
                                width="400"
                                height="225"
                            >
                        </div>
                        <div>
                            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">{{ $dept['title'] }}</h2>
                            <p class="text-white text-sm md:text-base line-clamp-3 mb-4">
                                {{ $dept['desc'] }}
                            </p>
                            <a href="/jurusan" class="inline-block">
                                <button class="bg-white text-[#242424] text-sm md:text-base font-medium py-1.5 px-5 rounded-full hover:bg-gray-100 transition-colors">
                                    Selengkapnya
                                </button>
                            </a>
                        </div>
                        <img
                            class="absolute -bottom-2 -right-6 w-48 opacity-30 -rotate-12"
                            src="{{ $assetBase }}/assets/{{ $dept['bg_image'] }}"
                            alt=""
                            loading="lazy"
                        >
                    </div>
                    @endforeach

                </div>
            </section>

            <!-- Student Habits Section - Optimized images -->
            <section class="bg-gray-200 py-8 md:py-12 rounded-xl mt-6 md:mt-8">
                <div class="container mx-auto px-4">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6 md:mb-10">
                        KEBIASAAN MURID SKARIGA
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 justify-items-center">
                        @foreach([
                            ['title' => 'Cek Kelengkapan Seragam', 'image' => 'ceksabuk.jpg', 'desc' => 'Sebelum memasuki sekolah, siswa wajib menunjukan kelengkapan seragam'],
                            ['title' => 'Jalur Hijau', 'image' => 'jalurhijau.jpg', 'desc' => 'SKARIGA selalu membiasakan warga sekolah untuk berjalan di jalur hijau, seperti yang diterapkan di industri'],
                            ['title' => 'Mengaji Pagi', 'image' => 'mengajipagi.jpg', 'desc' => 'Bagi siswa muslim, SKARIGA mengadakan mengaji pagi bersama, seperti membaca juz amma, dan doa pagi. Bagi non Muslim SKARIGA memberi tempat untuk beribadah pagi'],
                            ['title' => 'Makan Bersama', 'image' => 'kebiasaan-4(2).webp', 'desc' => 'Pada istirahat pertama, budaya yang melekat pada murid-murid SKARIGA adalah budaya makan bersama secara lesehan']
                        ] as $habit)
                        <x-habitcard
                            :title="$habit['title']"
                            :image="$habit['image']"
                            loading="lazy"
                        >
                            {{ $habit['desc'] }}
                        </x-habitcard>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>

        <!-- News Sidebar - Optimized loops & event delegation -->
        <aside class="w-full lg:w-1/4 lg:pl-6 mt-6 lg:mt-0">
            <div class="bg-white p-4 md:p-5 rounded-xl shadow-sm">
                <h3 class="font-bold text-lg md:text-xl mb-4 border-b-2 border-customOrange pb-2">Berita Terbaru</h3>
                <div id="x-sidenews" class="space-y-4" data-news-container>
                    @foreach ($beritas->take(4) as $berita)
                    <div class="sidenews-item cursor-pointer transition-colors duration-200 hover:bg-gray-50 p-2 rounded-lg"
                         data-news-id="{{ $berita->id }}"
                         data-news-title="{{ $berita->title }}"
                         data-news-desc="{{ $berita->deskripsi }}"
                         data-news-image="{{ $berita->gambar }}">
                        <x-sidenews
                            :title="$berita->title"
                            :image="$berita->gambar"
                            loading="lazy"
                        />
                    </div>
                    @endforeach

                    <a href="/berita" class="block mt-4">
                        <button class="w-full bg-customOrange text-white py-2 rounded-lg font-medium hover:bg-customBlue transition-colors">
                            Lihat Berita Lainnya
                        </button>
                    </a>
                </div>
            </div>

            <!-- Quick Links - Optimized -->
            <div class="bg-white p-4 md:p-5 rounded-xl shadow-sm mt-4 md:mt-6">
                <h3 class="font-bold text-lg md:text-xl mb-4 border-b-2 border-customBlue pb-2">Lainnya</h3>
                <ul class="space-y-2">
                    @foreach([
                        ['url' => 'http://117.102.78.163/student/', 'text' => 'OCS (One Click Service)'],
                        ['url' => 'http://117.102.78.163/ocscbt/', 'text' => 'CBT (Computer Based Test)'],
                        ['url' => 'https://bki-skariga.web.id/kerjasama-industri/', 'text' => 'Bidang Kerja Sama Industri'],
                        ['url' => 'http://117.102.78.163/portalakademik/', 'text' => 'Portal Akademik']
                    ] as $link)
                    <li>
                        <a href="{{ $link['url'] }}"
                           class="text-blue-600 hover:text-blue-800 hover:underline flex items-center text-sm md:text-base transition-colors"
                           target="_blank" rel="noopener">
                            <i class="fas fa-link mr-2 text-xs md:text-sm"></i>{{ $link['text'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
    <script defer>
    document.addEventListener('click', function(e) {
        const newsItem = e.target.closest('[data-news-id]');
        if (newsItem) {
            const { newsId, newsTitle, newsDesc, newsImage } = newsItem.dataset;
            window.showNews(newsId, newsTitle, newsDesc, newsImage);
        }
    });
    </script>
</x-layout>
