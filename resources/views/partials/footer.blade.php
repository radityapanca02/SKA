<footer class="w-full bg-transparent-to-b from-gray-900 to-gray-800 text-gray-300 relative overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <div class="absolute top-10 left-1/4 w-64 h-64 rounded-full bg-primary animate-pulse-slow"></div>
            <div class="absolute bottom-10 right-1/4 w-48 h-48 rounded-full bg-primary animate-float"></div>
        </div>

        <!-- Container dengan rounded border -->
        <div
            class="relative z-10 bg-gradient-to-b from-gray-800 to-gray-900 rounded-3xl p-6 md:p-8 lg:p-10 shadow-2xl border border-gray-700">
            <!-- GRID FOOTER -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-10">
                <!-- Logo & Brand - Diperkecil dan disejajarkan -->
                <div class="md:col-span-2 lg:col-span-1 mt-16">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 flex-shrink-0">
                            <img src="{{ asset('assets/icon.png') }}" alt="logo_SKARIGA"
                                class="w-full h-full object-contain rounded-full">
                        </div>
                        <div class="flex flex-col">
                            <h2 class="text-white font-bold text-lg sm:text-xl lg:text-2xl mb-0.5">SKARIGA</h2>
                            <p class="text-xs text-gray-400">Successful by Discipline</p>
                        </div>
                    </div>
                </div>

                <!-- Tentang Sekolah -->
                <div class="lg:col-span-1">
                    <h3 class="text-white font-semibold mb-4 text-lg relative inline-block">
                        <span class="relative z-10">Tentang Sekolah</span>
                        <span class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="/profile"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Profil
                            </a>
                        </li>
                        <li>
                            <a href="/program/jurusan"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Jurusan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Informasi & Layanan -->
                <div class="lg:col-span-1">
                    <h3 class="text-white font-semibold mb-4 text-lg relative inline-block">
                        <span class="relative z-10">Informasi & Layanan</span>
                        <span class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/informasi/berita"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Berita
                            </a>
                        </li>
                        <li>
                            <a href="/informasi/ssb"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Pendaftaran
                            </a>
                        </li>
                        <li>
                            <a href="/informasi/kegiatan"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Kegiatan
                            </a>
                        </li>
                        <li>
                            <a href="/informasi/prestasi"
                                class="footer-link flex items-center text-sm hover:text-white transition-colors duration-300">
                                <i class="fas fa-chevron-right text-primary mr-2 text-xs flex-shrink-0"></i>
                                Prestasi
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="lg:col-span-1">
                    <h3 class="text-white font-semibold mb-4 text-lg relative inline-block">
                        <span class="relative z-10">Kontak</span>
                        <span class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></span>
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mr-3 mt-1 flex-shrink-0"></i>
                            <span class="break-words">Jl. Raya Tlogomas No. 3, Malang, Jawa Timur</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-primary mr-3 flex-shrink-0"></i>
                            <span>(0341) 123456</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-primary mr-3 flex-shrink-0"></i>
                            <span class="break-all text-xs sm:text-sm">info@smkpgri3malang.sch.id</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock text-primary mr-3 flex-shrink-0"></i>
                            <span>Senin - Jumat: 07:00 - 16:00</span>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="md:col-span-2 lg:col-span-1">
                    <div class="rounded-lg overflow-hidden map-container shadow-lg">
                        <div class="bg-gray-800 h-48 lg:h-40 w-full">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6898708661834!2d112.6019448!3d-7.9274244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78821eaa6b3655%3A0x3cd0ba7cc35c7b6d!2sSMK%20PGRI%203%20Malang!5e0!3m2!1sid!2sid!4v1758358772409!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                class="w-full h-full">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER BOTTOM BAR -->
            <div class="mt-10 pt-6 border-t border-gray-700">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                    <!-- Social Media -->
                    <div class="flex flex-col sm:flex-row items-center gap-4 order-2 lg:order-1">
                        <span class="text-gray-400 text-sm whitespace-nowrap">Social Media:</span>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/SKARIGA" target="_blank"
                                class="social-icon w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                            <a href="https://www.instagram.com/skariga_official" target="_blank"
                                class="social-icon w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-instagram text-sm"></i>
                            </a>
                            <a href="https://www.youtube.com/@smkpgri3malang945" target="_blank"
                                class="social-icon w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-youtube text-sm"></i>
                            </a>
                            <a href="https://www.tiktok.com/@skariga" target="_blank"
                                class="social-icon w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-tiktok text-sm"></i>
                            </a>
                            <a href="https://wa.me/6285799190111" target="_blank"
                                class="social-icon w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-white transition-all duration-300">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Supported by - PERBAIKAN BESAR DI SINI -->
                    <div class="flex flex-col items-center order-1 lg:order-2 w-full lg:w-auto">
                        <span class="text-gray-400 text-sm tracking-wide mb-3 whitespace-nowrap font-medium">Supported
                            by:</span>
                        <div
                            class="bg-white p-3 sm:p-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-105 w-full max-w-[280px] sm:max-w-[320px] md:max-w-[360px]">
                            <img src="{{ asset('assets/JagoanSupport.png') }}" alt="Jagoan Support"
                                class="w-full h-auto object-contain max-h-[60px] sm:max-h-[70px] md:max-h-[80px]">
                        </div>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center order-3 lg:order-3">
                        <span class="text-gray-400 text-sm whitespace-nowrap">© SMK PGRI 3 MALANG | 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .footer-link {
            position: relative;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            width: fit-content;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: #f97316;
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        .social-icon {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .social-icon:hover {
            transform: translateY(-2px) scale(1.05);
        }

        .map-container {
            transition: all 0.3s ease;
            filter: grayscale(0.2);
        }

        .map-container:hover {
            filter: grayscale(0);
            transform: scale(1.01);
        }

        @keyframes shine {
            0% {
                background-position: -100% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        .shine-animate {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            background-size: 200% 100%;
            animation: shine 8s infinite;
        }
    </style>
</footer>
