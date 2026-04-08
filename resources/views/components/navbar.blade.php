<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<header class="bg-white rounded-2xl shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-4 py-3 md:px-6">
        <div class="flex items-center space-x-3">
            <div
                class="w-16 h-10 md:w-20 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-xs md:text-sm overflow-hidden pulse-grow">
                <img src="{{ asset('assets/icon.png') }}" alt="Logo Sekolah"
                    class="w-full h-full object-cover">
            </div>
            <span
                class="text-xl md:text-2xl font-extrabold text-gray-800 hover:text-primary cursor-pointer transition duration-300"></span>
        </div>

        <nav class="hidden md:flex space-x-6 lg:space-x-8 font-semibold text-gray-700">
            <a href="/"
                class="relative group py-2 hover:text-primary transition {{ request()->is('/') ? 'text-primary' : '' }}">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full {{ request()->is('/') ? 'w-full' : '' }}"></span>
            </a>
            <a href="/profile"
                class="relative group py-2 hover:text-primary transition {{ request()->is('profile') || request()->is('profile/*') ? 'text-primary' : '' }}">
                Profile
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full {{ request()->is('profile') || request()->is('profile/*') ? 'w-full' : '' }}"></span>
            </a>

            <div class="relative group" id="program-desktop">
                <button
                    class="flex items-center space-x-1 py-2 text-gray-700 font-semibold hover:text-primary transition focus:outline-none dropdown-btn {{ request()->is('program/*') ? 'text-primary' : '' }}">
                    <span>Program</span>
                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div
                    class="absolute hidden bg-white shadow-lg mt-2 rounded-lg w-48 border border-gray-200 dropdown-menu transform origin-top">
                    <a href="/program/organisasi"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('program/organisasi') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Organisasi
                        </span>
                    </a>
                    <a href="/program/jurusan"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('program/jurusan') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Jurusan
                        </span>
                    </a>
                </div>
            </div>

            <div class="relative group" id="informasi-desktop">
                <button
                    class="flex items-center space-x-1 py-2 text-gray-700 font-semibold hover:text-primary transition focus:outline-none dropdown-btn {{ request()->is('informasi/*') ? 'text-primary' : '' }}">
                    <span>Informasi</span>
                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div
                    class="absolute hidden bg-white shadow-lg mt-2 rounded-lg w-48 border border-gray-200 dropdown-menu transform origin-top">
                    <a href="/informasi/berita"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('informasi/berita') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Berita
                        </span>
                    </a>
                    <a href="/informasi/kegiatan"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('informasi/kegiatan') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Kegiatan
                        </span>
                    </a>
                    <a href="/informasi/prestasi"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('informasi/prestasi') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Prestasi
                        </span>
                    </a>
                    <a href="/informasi/ssb"
                        class="dropdown-item block px-5 py-3 transition {{ request()->is('informasi/ssb') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Pendaftaran
                        </span>
                    </a>
                </div>
            </div>

            <a href="/kontak"
                class="relative group py-2 hover:text-primary transition {{ request()->is('kontak') ? 'text-primary' : '' }}">
                Kontak Kami
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full {{ request()->is('kontak') ? 'w-full' : '' }}"></span>
            </a>
        </nav>

        <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-primary focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 transform origin-top">
        <div class="container mx-auto px-4 py-3 space-y-3">
            <a href="/"
                class="block py-2 text-gray-700 font-medium hover:text-primary transition menu-slide {{ request()->is('/') ? 'text-primary' : '' }}">
                <i class="fas fa-home mr-2 w-5 text-center"></i>
                Beranda
            </a>
            <a href="/profile"
                class="block py-2 text-gray-700 font-medium hover:text-primary transition menu-slide {{ request()->is('profile') || request()->is('profile/*') ? 'text-primary' : '' }}">
                <i class="fas fa-user mr-2 w-5 text-center"></i>
                Profile
            </a>

            <div>
                <button
                    class="w-full flex justify-between items-center py-2 text-gray-700 font-medium hover:text-primary transition focus:outline-none mobile-dropdown-btn menu-slide {{ request()->is('program/*') ? 'text-primary' : '' }}">
                    <span><i class="fas fa-list mr-2 w-5 text-center"></i>Program</span>
                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden pl-4 mt-1 space-y-2 mobile-dropdown-menu">
                    <a href="/program/organisasi"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('program/organisasi') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Organisasi
                        </span>
                    </a>
                    <a href="/program/jurusan"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('program/jurusan') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Jurusan
                        </span>
                    </a>
                </div>
            </div>

            <div>
                <button
                    class="w-full flex justify-between items-center py-2 text-gray-700 font-medium hover:text-primary transition focus:outline-none mobile-dropdown-btn menu-slide {{ request()->is('informasi/*') ? 'text-primary' : '' }}">
                    <span><i class="fas fa-info-circle mr-2 w-5 text-center"></i>Informasi</span>
                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden pl-4 mt-1 space-y-2 mobile-dropdown-menu">
                    <a href="/informasi/berita"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('informasi/berita') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Berita
                        </span>
                    </a>
                    <a href="/informasi/kegiatan"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('informasi/kegiatan') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Kegiatan
                        </span>
                    </a>
                    <a href="/informasi/prestasi"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('informasi/prestasi') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Prestasi
                        </span>
                    </a>
                    <a href="/informasi/ssb"
                        class="dropdown-item block py-2 text-gray-600 hover:text-primary transition {{ request()->is('informasi/ssb') ? 'text-primary bg-gray-50' : '' }}">
                        <span class="flex items-center">
                            Informasi SSB
                        </span>
                    </a>
                </div>
            </div>

            <a href="/kontak"
                class="block py-2 text-gray-700 font-medium hover:text-primary transition menu-slide {{ request()->is('kontak') ? 'text-primary' : '' }}">
                <i class="fas fa-phone mr-2 w-5 text-center"></i>
                Kontak Kami
            </a>
        </div>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const desktopDropdowns = document.querySelectorAll(
            "#program-desktop, #informasi-desktop"
        );
        const mobileDropdownButtons = document.querySelectorAll(
            ".mobile-dropdown-btn"
        );

        mobileMenuButton.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");

            if (!mobileMenu.classList.contains("hidden")) {
                const menuItems = document.querySelectorAll(".menu-slide");
                menuItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add("show");
                    }, index * 100);
                });
            } else {
                document.querySelectorAll(".menu-slide").forEach((item) => {
                    item.classList.remove("show");
                });
            }
        });

        desktopDropdowns.forEach((dropdown) => {
            const button = dropdown.querySelector(".dropdown-btn");
            const menu = dropdown.querySelector(".dropdown-menu");

            button.addEventListener("click", function (e) {
                e.stopPropagation();

                document.querySelectorAll(".dropdown-menu").forEach((otherMenu) => {
                    if (otherMenu !== menu) {
                        otherMenu.classList.add("hidden");
                    }
                });

                menu.classList.toggle("hidden");

                const icon = button.querySelector("svg");
                icon.classList.toggle("rotate-180");
            });
        });

        mobileDropdownButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const menu = this.nextElementSibling;

                document
                    .querySelectorAll(".mobile-dropdown-menu")
                    .forEach((otherMenu) => {
                        if (otherMenu !== menu) {
                            otherMenu.classList.add("hidden");
                        }
                    });
                menu.classList.toggle("hidden");

                const icon = this.querySelector("svg");
                icon.classList.toggle("rotate-180");
            });
        });

        document.addEventListener("click", function (e) {
            if (!e.target.closest(".group")) {
                document.querySelectorAll(".dropdown-menu").forEach((menu) => {
                    menu.classList.add("hidden");
                });

                document.querySelectorAll(".dropdown-btn svg").forEach((icon) => {
                    icon.classList.remove("rotate-180");
                });
            }

            if (
                !e.target.closest("#mobile-menu") &&
                !e.target.closest("#mobile-menu-button")
            ) {
                document
                    .querySelectorAll(".mobile-dropdown-menu")
                    .forEach((menu) => {
                        menu.classList.add("hidden");
                    });

                document
                    .querySelectorAll(".mobile-dropdown-btn svg")
                    .forEach((icon) => {
                        icon.classList.remove("rotate-180");
                    });
            }
        });

        document
            .querySelectorAll(".dropdown-menu, .mobile-dropdown-menu")
            .forEach((menu) => {
                menu.addEventListener("click", function (e) {
                    e.stopPropagation();
                });
            });
    });
</script>
