@props(['transparent' => false])

<!-- Wrapper sticky -->
<div x-data="{ scrolled: false }" x-init="
        scrolled = window.scrollY > 50;
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50;
        });
    " :class="scrolled
        ? 'sticky top-4 z-50 px-4'
        : '{{ $transparent ? 'absolute top-0 left-0 w-full z-50 px-4' : 'sticky top-0 z-50 px-4' }}'
    ">
    <!-- Header/Navigation -->
    <header :class="scrolled
            ? 'bg-white text-[#313131] shadow-md rounded-2xl'
            : '{{ $transparent ? 'bg-transparent text-white rounded-2xl' : 'bg-white text-[#313131] rounded-2xl' }}'"
        class="w-full transition-all duration-300 ease-in-out" id="header">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/"><img class="w-12 h-9 sm:w-16 sm:h-12 md:w-24 md:h-16 object-contain"
                            src="{{ $assetBase . '/assets/skariga logo 1.png' }}" alt="Logo SMK PGRI 3 Malang"></a>
                    <div class="ml-2 sm:ml-3 md:ml-4">
                        <div class="text-sm sm:text-base md:text-xl font-medium leading-tight">SMK PGRI 3 MALANG</div>
                        <div class="text-xs sm:text-xs md:text-sm font-medium leading-tight">Success By Discipline</div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:block">
                    <ul class="flex space-x-4 lg:space-x-6 xl:space-x-8 text-base md:text-lg font-medium">
                        <li><a href="/"
                                class="{{ request()->is('/') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Beranda</a>
                        </li>
                        <li><a href="/berita"
                                class="{{ request()->is('berita*') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Berita</a>
                        </li>
                        <li><a href="/profil"
                                class="{{ request()->is('profil') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Profil</a>
                        </li>
                        <li><a href="/prestasi"
                                class="{{ request()->is('prestasi') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Prestasi</a>
                        </li>
                        <li class="relative group">
                            <a
                                class="{{ request()->is('jurusan') || request()->is('ekstrakurikuler') ? 'text-customOrange' : '' }} hover:text-customOrange hover:cursor-pointer transition flex items-center whitespace-nowrap">
                                Program
                            </a>
                            <ul
                                class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 z-50">
                                <li><a href="/jurusan"
                                        class="{{ request()->is('jurusan') ? 'text-customOrange' : '' }} text-black block px-4 py-2 hover:text-customOrange whitespace-nowrap">Jurusan</a>
                                </li>
                                <li><a href="/ekstrakurikuler"
                                        class="{{ request()->is('ekstrakurikuler') ? 'text-customOrange' : '' }} text-black block px-4 py-2 hover:text-customOrange whitespace-nowrap">Ekstrakurikuler</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/alumni"
                                class="{{ request()->is('alumni') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Alumni</a>
                        </li>
                        <li><a href="/pendaftaran"
                                class="{{ request()->is('pendaftaran') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Pendaftaran</a>
                        </li>
                        <li class="flex items-center space-x-2 max-w-[180px] lg:max-w-[200px] xl:max-w-[220px] min-w-[120px] flex-shrink">
                            <i class="fa fa-search text-gray-500 flex-shrink-0 text-sm" aria-hidden="true"></i>
                            <div class="flex-1 relative w-full">
                                <input type="text" id="search-bar" name="search-bar" placeholder="Cari"
                                    class="w-full border border-black/20 px-2 py-1 rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                                    autocomplete="off">
                                <div id="search-results"
                                    class="absolute top-full left-0 right-0 mt-1 border border-gray-200 rounded hidden bg-white shadow-md z-50 max-h-60 overflow-y-auto">
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Tablet Navigation (768px - 1023px) -->
                <nav class="hidden md:block lg:hidden">
                    <ul class="flex space-x-3 text-sm font-medium">
                        <li><a href="/"
                                class="{{ request()->is('/') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Beranda</a>
                        </li>
                        <li><a href="/berita"
                                class="{{ request()->is('berita*') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Berita</a>
                        </li>
                        <li><a href="/profil"
                                class="{{ request()->is('profil') ? 'text-customOrange' : '' }} hover:text-customOrange transition whitespace-nowrap">Profil</a>
                        </li>
                        <li class="relative group">
                            <a
                                class="{{ request()->is('prestasi') || request()->is('jurusan') || request()->is('ekstrakurikuler') || request()->is('alumni') || request()->is('pendaftaran') ? 'text-customOrange' : '' }} hover:text-customOrange hover:cursor-pointer transition flex items-center whitespace-nowrap">
                                Lainnya
                            </a>
                            <ul
                                class="absolute left-0 mt-2 w-32 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 z-50">
                                <li><a href="/prestasi"
                                        class="{{ request()->is('prestasi') ? 'text-customOrange' : '' }} text-black block px-3 py-2 hover:text-customOrange text-sm whitespace-nowrap">Prestasi</a>
                                </li>
                                <li><a href="/jurusan"
                                        class="{{ request()->is('jurusan') ? 'text-customOrange' : '' }} text-black block px-3 py-2 hover:text-customOrange text-sm whitespace-nowrap">Jurusan</a>
                                </li>
                                <li><a href="/ekstrakurikuler"
                                        class="{{ request()->is('ekstrakurikuler') ? 'text-customOrange' : '' }} text-black block px-3 py-2 hover:text-customOrange text-sm whitespace-nowrap">Ekskul</a>
                                </li>
                                <li><a href="/alumni"
                                        class="{{ request()->is('alumni') ? 'text-customOrange' : '' }} text-black block px-3 py-2 hover:text-customOrange text-sm whitespace-nowrap">Alumni</a>
                                </li>
                                <li><a href="/pendaftaran"
                                        class="{{ request()->is('pendaftaran') ? 'text-customOrange' : '' }} text-black block px-3 py-2 hover:text-customOrange text-sm whitespace-nowrap">Daftar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="flex items-center space-x-1 max-w-[140px] min-w-[100px] flex-shrink">
                            <i class="fa fa-search text-gray-500 flex-shrink-0 text-xs" aria-hidden="true"></i>
                            <div class="flex-1 relative w-full">
                                <input type="text" id="tablet-search" name="tablet-search" placeholder="Cari"
                                    class="w-full border border-black/20 px-1 py-1 rounded text-xs focus:outline-none focus:ring-1 focus:ring-blue-300"
                                    autocomplete="off">
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="hamburger" id="hamburger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="nav-menu mt-2 md:hidden hidden" id="navMenu">
                <ul class="space-y-1 pb-4 text-base font-medium">
                    <li><a href="/"
                            class="{{ request()->is('/') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Beranda</a>
                    </li>
                    <li><a href="/berita"
                            class="{{ request()->is('berita') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Berita</a>
                    </li>
                    <li><a href="/profil"
                            class="{{ request()->is('profil') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Profil</a>
                    </li>
                    <li><a href="/prestasi"
                            class="{{ request()->is('prestasi') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Prestasi</a>
                    </li>
                    <li><a href="/jurusan"
                            class="{{ request()->is('jurusan') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Jurusan</a>
                    </li>
                    <li><a href="/ekstrakurikuler"
                            class="{{ request()->is('ekstrakurikuler') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Ekstrakurikuler</a>
                    </li>
                    <li><a href="/alumni"
                            class="{{ request()->is('alumni') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Alumni</a>
                    </li>
                    <li><a href="/pendaftaran"
                            class="{{ request()->is('pendaftaran') ? 'text-customOrange' : '' }} block py-2 px-3 hover:text-customOrange transition rounded hover:bg-gray-100">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>

@if (!$transparent)
<script>
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('header');
    document.addEventListener('scroll', () => {
        if (window.scrollY >= 24) {
            header?.classList.add('bg-white', 'text-[#313131]', 'shadow-md');
        } else {
            header?.classList.remove('bg-white', 'text-[#313131]', 'shadow-md');
        }
    });

    // Mobile menu toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');

    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });

    // Tablet search functionality
    const tabletSearch = document.getElementById('tablet-search');
    if (tabletSearch) {
        tabletSearch.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            // Implement tablet search logic here if needed
            console.log('Tablet search:', query);
        });
    }
});

// Search Bar JS Section (Desktop)
const url = ["/", "/berita", "/profil", "/prestasi", "/jurusan", "/ekstrakurikuler", "/alumni", "/pendaftaran"];

const data = [
    {name: "Beranda", url: url[0]}, {name: "Kebiasaan Murid SKARIGA", url: url[0]}, {name: "Landing Page", url: url[0]}, {name: "Home", url: url[0]}, {name: "Headnews", url: url[0]}, {name: "Departemen", url: url[0]},
    {name: "Berita", url: url[1]}, {name: "News", url: url[1]}, {name: "Kalender Akademik", url: url[1]},
    {name: "Profil", url: url[2]}, {name: "Visi", url: url[2]}, {name: "Misi", url: url[2]},
    {name: "Prestasi", url: url[3]}, {name: "Para Jawara", url: url[3]}, {name: "Daftar Juara", url: url[3]},
    {name: "Jurusan", url: url[4]}, {name: "Konsentrasi Keahlian", url: url[4]}, {name: "Major", url: url[4]}, {name: "Elektronika", url: url[4]}, {name: "Otomotif", url: url[4]}, {name: "Pemesinan", url: url[4]}, {name: "TIK", url: url[4]},
    {name: "Ekstrakurikuler", url: url[5]}, {name: "Ekskul", url: url[5]},
    {name: "Alumni", url: url[6]}, {name: "Lulusan", url: url[6]}, {name: "Graduate", url: url[6]},
    {name: "Pendaftaran", url: url[7]}, {name: "Chat Admin", url: url[7]}, {name: "Daftar Offline", url: url[7]}, {name: "Daftar Online", url: url[7]}, {name: "Keuntungan Bergabung", url: url[7]},
];

const input = document.getElementById('search-bar');
const resultsContainer = document.getElementById('search-results');

if (input) {
    input.addEventListener('input', () => {
        const query = input.value.toLowerCase().trim();
        resultsContainer.innerHTML = '';

        if (query === '') {
            resultsContainer.classList.add('hidden');
            return;
        }

        const filtered = data.filter(item => item.name.toLowerCase().includes(query));

        if (filtered.length === 0) {
            resultsContainer.innerHTML = `<li class="p-2 text-gray-500 text-sm">Tidak ada hasil</li>`;
        } else {
            filtered.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="${item.url}" class="block p-2 text-sm hover:bg-blue-100 transition">${item.name}</a>`;
                resultsContainer.appendChild(li);
            });
        }

        resultsContainer.classList.remove('hidden');
        
        // Adjust search results width to match input
        const inputRect = input.getBoundingClientRect();
        resultsContainer.style.width = inputRect.width + 'px';
    });

    // Close search results when clicking outside
    document.addEventListener('click', (e) => {
        if (!input.contains(e.target) && !resultsContainer.contains(e.target)) {
            resultsContainer.classList.add('hidden');
        }
    });
}
</script>
@endif