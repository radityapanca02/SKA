@extends('layouts.app')
@push('styles')
    <style>
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .card-active {
            transform: translateX(0) scale(1);
            opacity: 1;
            transition: all 0.4s ease;
        }

        .card-behind {
            transform: translateX(80px) scale(0.9);
            opacity: 0.9;
            transition: all 0.4s ease;
        }

        .card-far-behind {
            transform: translateX(160px) scale(0.8);
            opacity: 0.7;
            transition: all 0.4s ease;
        }

        .card-more-behind {
            transform: translateX(240px) scale(0.7);
            opacity: 0.5;
            transition: all 0.4s ease;
        }

        .bg-circle {
            position: absolute;
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            opacity: 0.7;
            z-index: -1;

        }

        @media (min-width: 1024px) {
            .bg-circle {
                width: 28rem;
                height: 28rem;
            }
        }

        /* Warna lingkaran */
        .bg-orange-blur {
            background: rgba(255, 179, 132, 0.6);
            /* Orange soft */
        }

        .bg-blue-blur {
            background: rgba(174, 219, 228, 0.6);
            /* Blue soft */
        }

        .swiper-slide {
            position: relative;
        }

        .swiper-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6));
            z-index: 1;
        }

        .swiper-slide>div {
            position: relative;
            z-index: 0;
        }

        .swiper-slide-industri {
            width: auto;
            flex-shrink: 0;
        }

        .card-active {
            transform: translateX(0) scale(1);
            opacity: 1;
            z-index: 40;
            filter: brightness(1);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .card-behind {
            transform: translateX(100px) scale(0.92);
            opacity: 1;
            z-index: 30;
            filter: brightness(0.9);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .card-far-behind {
            transform: translateX(200px) scale(0.84);
            opacity: 1;
            z-index: 20;
            filter: brightness(0.8);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .card-more-behind {
            transform: translateX(300px) scale(0.76);
            opacity: 1;
            z-index: 10;
            filter: brightness(0.7);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Responsive styles untuk card departemen */
        @media (max-width: 768px) {
            .card-container {
                height: auto !important;
                min-height: 400px;
            }

            .card {
                height: auto !important;
                min-height: 380px;
                margin-bottom: 20px;
            }

            .card .flex {
                flex-direction: column;
                height: auto;
            }

            .card img {
                height: 200px !important;
                width: 100% !important;
            }

            .card>div>div {
                width: 100% !important;
            }

            .card .p-6 {
                padding: 1.5rem !important;
            }

            /* Tombol selengkapnya di mobile */
            .redirect-department {
                width: 100%;
                text-align: center;
                padding: 12px 16px !important;
                font-size: 14px !important;
                margin-top: 1rem;
            }

            /* Adjust card positioning untuk mobile */
            .card-active {
                transform: translateX(0) scale(1) !important;
                position: relative !important;
                margin: 0 auto;
            }

            .card-behind,
            .card-far-behind,
            .card-more-behind {
                display: none !important;
            }

            /* Dots indicator untuk mobile */
            .dot {
                width: 8px !important;
                height: 8px !important;
            }

            .dot.w-6 {
                width: 24px !important;
            }
        }

        @media (max-width: 640px) {
            .card {
                min-height: 350px;
            }

            .card img {
                height: 180px !important;
            }

            .card .p-6 {
                padding: 1rem !important;
            }

            .card h3 {
                font-size: 1.5rem !important;
            }

            .card p {
                font-size: 0.9rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 480px) {
            .card {
                min-height: 320px;
                margin-bottom: 15px;
            }

            .card img {
                height: 160px !important;
            }

            .redirect-department {
                padding: 10px 14px !important;
                font-size: 13px !important;
            }
        }

        /* Pastikan tombol selalu terlihat */
        .redirect-department {
            position: relative !important;
            z-index: 50 !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
@endpush
@section('content')
    <div class="relative overflow- bg-white">
        <div class="relative bg-gradient-to-r text-white">
            <div class="absolute inset-0 z-0">
                <div class="swiper-container h-[460px] w-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="w-full h-[450px] bg-cover bg-center"
                                style="background-image: url('{{ asset('assets/Hero1.jpeg') }}')">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full h-[450px] bg-cover bg-center"
                                style="background-image: url('{{ asset('assets/Hero4.png') }}')">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full h-[450px] bg-cover bg-center"
                                style="background-image: url('{{ asset('assets/Hero3.png') }}')">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 bg-black opacity-40"></div>
            </div>

            <div class="relative z-10 container mx-auto px-4 py-16 md:py-24">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-center md:text-left">
                        <div class="mb-6">
                            <h1 class="text-6xl md:text-4xl lg:text-6xl font-bebas mb-4 leading-tight text-orange-500">
                                SUCCESS BY<br>
                                <span class="text-white">DISCIPLINE</span>
                            </h1>
                            <p class="text-xl md:text-2xl text-blue-100 mb-6">
                                Membentuk siswa cerdas, terampil, dan berkarakter
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <a href="/profile" class="flex justify-center md:block">
                                <button
                                    class="border-2 border-white text-white hover:bg-orange-600 hover:text-white hover:scale-105 hover:shadow-lg px-8 py-3 rounded-lg font-semibold transition-all flex items-center justify-center">
                                    Profile
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div
                            class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl">
                            <div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">1000+</div>
                            <div class="text-white">Siswa Aktif</div>
                        </div>
                        <div
                            class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl">
                            <div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">50+</div>
                            <div class="text-white">Guru Berpengalaman</div>
                        </div>
                        <div
                            class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl">
                            <div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">16</div>
                            <div class="text-white">Program Jurusan</div>
                        </div>
                        <div
                            class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl">
                            <div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">100+</div>
                            <div class="text-white">Kerjasama Industri</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Circles -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="bg-blue-blur bg-circle -left-32 -top-1/4"></div>
            <div class="bg-blue-blur bg-circle -left-28 top-1/3"></div>
            <div class="bg-orange-blur bg-circle -right-32 top-1/4"></div>
            <div class="bg-orange-blur bg-circle -right-28 bottom-40"></div>
        </div>


        <!-- ==Rekomendasi Jurusan== -->
        <section class="relative z-10 w-full py-16 bg-transparent flex justify-center">
            <div class="w-full max-w-6xl px-4 flex flex-col lg:flex-row gap-12">
                <!-- Kiri -->
                <div class="w-full lg:w-2/5 flex flex-col justify-center">
                    <div id="leftContent">
                        <h2 class="text-5xl md:text-6xl font-bebas text-gray-900 mb-4">
                            TEMUKAN JURUSAN
                        </h2>
                        <div class="text-4xl md:text-5xl font-bebas text-orange-400 mb-6">
                            YANG COCOK UNTUKMU
                        </div>
                        <p class="text-lg text-gray-700 mb-6">
                            Masih bingung memilih jurusan?<br />
                            Ceritakan apa yang kamu ketahui, bakat, atau passion-mu,<br />
                            dan kami akan rekomendasikan jurusan yang paling sesuai!
                        </p>

                        <!-- Contoh Input yang Bisa Dicoba -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                            <h4 class="font-semibold text-blue-800 mb-2 flex items-center">
                                <i class="fas fa-lightbulb mr-2 text-orange-500"></i>
                                Contoh yang bisa kamu tulis:
                            </h4>
                            <div class="text-sm text-blue-700 space-y-1">
                                <div>• "Saya suka coding dan buat aplikasi"</div>
                                <div>• "Suka otak-atik mesin dan elektronik"</div>
                                <div>• "Hobi desain grafis dan editing video"</div>
                                <div>• "Tertarik dengan jaringan komputer"</div>
                                <div>• "Suka bekerja dengan tangan dan alat"</div>
                            </div>
                        </div>

                        <!-- Keunggulan Fitur -->
                        <!-- <div class="space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                            <span>Analisis AI cerdas berdasarkan minatmu</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                            <span>Rekomendasi jurusan utama & alternatif</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-3 text-lg"></i>
                            <span>Penjelasan detail prospek karir</span>
                        </div>
                    </div>
                     -->
                    </div>

                    <div id="resultContainer"
                        class="hidden bg-gradient-to-br from-blue-50 to-orange-50 p-8 rounded-2xl shadow-lg border border-orange-200">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">
                            REKOMENDASI JURUSAN
                        </h2>
                        <div class="w-20 h-1 bg-orange-500 mb-6"></div>
                        <div id="resultContent" class="space-y-6">
                        </div>
                    </div>
                </div>

                <!-- Form Kanan -->
                <div class="w-full lg:w-3/5 flex flex-col items-center">
                    <form id="recommendationForm"
                        class="w-full max-w-md bg-white rounded-2xl shadow-xl hover:shadow-2xl p-8 mb-8 border border-gray-100">
                        <div class="text-center mb-2">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-graduation-cap text-orange-500 text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bebas text-gray-800 mb-2">
                                APA YANG KAMU SUKA <span class="text-4xl text-orange-500">SUKA?</span>
                            </h3>
                            <p class="text-gray-600 text-sm mb-6">
                                Tuliskan apa yang kamu sukai, pelajaran favorit, atau cita-citamu
                            </p>
                        </div>

                        <div class="mb-6 relative">
                            <textarea id="keywordInput" name="keyword" placeholder="Bingung? coba tuliskan apa yang kamu ketahui disini"
                                class="w-full p-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none h-32"
                                rows="4" required></textarea>

                            <!-- Quick Suggestions
                        <div class="mt-3">
                            <p class="text-xs text-gray-500 mb-2">Coba ketik:</p>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" class="quick-suggestion text-xs bg-gray-100 hover:bg-orange-100 text-gray-700 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                                    programming
                                </button>
                                <button type="button" class="quick-suggestion text-xs bg-gray-100 hover:bg-orange-100 text-gray-700 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                                    desain grafis
                                </button>
                                <button type="button" class="quick-suggestion text-xs bg-gray-100 hover:bg-orange-100 text-gray-700 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                                    jaringan komputer
                                </button>
                                <button type="button" class="quick-suggestion text-xs bg-gray-100 hover:bg-orange-100 text-gray-700 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                                    teknik mesin
                                </button>
                            </div>
                        </div> -->
                        </div>

                        <button type="submit" id="submitButton"
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-2 rounded-xl font-semibold text-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-search mr-3"></i>
                            DAPATKAN REKOMENDASI
                        </button>
                    </form>

                    <div id="resetContainer" class="w-full max-w-md text-center animate-fade-in hidden">
                        <div
                            class="bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-lg border border-green-200">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-redo text-green-500 text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Coba Rekomendasi Lain</h3>
                            <p class="text-gray-600 mb-6">
                                Ingin menjelajahi jurusan lainnya? Klik tombol di bawah untuk mencari rekomendasi baru.
                            </p>
                            <button id="resetButton"
                                class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-sync-alt mr-2"></i>
                                Cari Rekomendasi Lain
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="relative z-10 bg-transparent py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-5xl font-bebas text-gray-800 mb-4">
                        Kenapa harus <span class="text-blue-500">SKARIGA?</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Sekolah Kejuruan Unggulan yang berfokus pada pengembangan potensi siswa
                        melalui pendidikan berkualitas dan pembentukan karakter disiplin.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-book-open text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kurikulum Modern</h3>
                        <p class="text-gray-600">Kurikulum terupdate yang sesuai dengan kebutuhan industri masa kini.</p>
                    </div>
                    <div
                        class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-laptop-code text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Fasilitas Lengkap</h3>
                        <p class="text-gray-600">Laboratorium dan peralatan modern untuk mendukung pembelajaran praktis.
                        </p>
                    </div>
                    <div
                        class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Bimbingan Karir</h3>
                        <p class="text-gray-600">Program bimbingan karir untuk mempersiapkan siswa memasuki dunia kerja.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-transparent -50 py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-5xl font-bebas text-gray-800 mb-4">
                        PEMBELAJARAN <span class="text-orange-500">PRAKTIS</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Metode pembelajaran yang mengutamakan praktek langsung dan pengalaman nyata.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500">
                        <i class="fas fa-tools text-4xl text-blue-600 mb-4"></i>
                        <h3 class="text-lg font-semibold mb-2">Workshop</h3>
                        <p class="text-gray-600">Sesi praktik langsung dengan alat dan materi nyata.</p>
                    </div>
                    <div
                        class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500">
                        <i class="fas fa-industry text-4xl text-orange-600 mb-4"></i>
                        <h3 class="text-lg font-semibold mb-2">Industry Visit</h3>
                        <p class="text-gray-600">Kunjungan langsung ke industri untuk belajar praktik terbaik.</p>
                    </div>
                    <div
                        class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500">
                        <i class="fas fa-handshake text-4xl text-blue-600 mb-4"></i>
                        <h3 class="text-lg font-semibold mb-2">Magang</h3>
                        <p class="text-gray-600">Program magang untuk pengalaman kerja langsung.</p>
                    </div>
                    <div
                        class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500">
                        <i class="fas fa-project-diagram text-4xl text-orange-600 mb-4"></i>
                        <h3 class="text-lg font-semibold mb-2">Project Based</h3>
                        <p class="text-gray-600">Pembelajaran melalui proyek nyata yang menantang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirect() {
            window.location.href = "/program/jurusan";
        }

        document.addEventListener('DOMContentLoaded', function() {

            // Elemen DOM
            const form = document.getElementById('recommendationForm');
            const keywordInput = document.getElementById('keywordInput');
            const keywordDropdown = document.getElementById('keywordDropdown');
            const submitButton = document.getElementById('submitButton');
            const resetButton = document.getElementById('resetButton');
            const leftContent = document.getElementById('leftContent');
            const resultContainer = document.getElementById('resultContainer');
            const resultContent = document.getElementById('resultContent');
            const resetContainer = document.getElementById('resetContainer');

            keywordInput.addEventListener('focus', function() {
                keywordDropdown.classList.remove('hidden');
            });

            keywordInput.addEventListener('blur', function() {
                setTimeout(() => {
                    keywordDropdown.classList.add('hidden');
                }, 200);
            });

            // Di dalam event listener form submit, ganti bagian tombol dengan cara yang lebih aman
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                submitButton.disabled = true;
                submitButton.innerHTML = `
    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    Memproses...
    `;

                try {
                    const response = await fetch("/api/gemini", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        body: JSON.stringify({
                            keyword: keywordInput.value
                        }),
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.error || 'Terjadi kesalahan');
                    }

                    if (data.jurusan_utama && data.jurusan_utama.name === "Tidak ditemukan") {
                        resultContent.innerHTML = `
            <div class="p-6 bg-red-50 border border-red-200 rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-red-800 mb-2">${data.jurusan_utama.name}</h3>
                <p class="text-red-700">${data.jurusan_utama.description}</p>
            </div>
            `;
                    } else if (data.jurusan_utama && data.jurusan_alternatif) {
                        // SIMPAN DATA REKOMENDASI KE LOCALSTORAGE DENGAN TIMESTAMP
                        const recommendationData = {
                            utama: data.jurusan_utama,
                            alternatif: data.jurusan_alternatif,
                            timestamp: Date.now(), // Tambahkan timestamp
                            expiresIn: 30000
                        };
                        localStorage.setItem('recommendedMajors', JSON.stringify(recommendationData));

                        // Gunakan metode yang lebih aman untuk membuat tombol
                        resultContent.innerHTML = `
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-2">Jurusan Utama:</h3>
                <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <h4 class="text-xl font-bold text-gray-900">${data.jurusan_utama.name}</h4>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mt-2">
                        ${data.jurusan_utama.department}
                    </span>
                    <p class="text-gray-700 mt-3">${data.jurusan_utama.description}</p>
                    <button type="button" class="redirect-btn bg-orange-500 text-white font-medium px-4 py-2 mt-4 rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1" data-major="${data.jurusan_utama.name}">
                        Lihat Selengkapnya →
                    </button>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-green-800 mb-2">Jurusan Alternatif:</h3>
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                    <h4 class="text-xl font-bold text-gray-900">${data.jurusan_alternatif.name}</h4>
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-2">
                        ${data.jurusan_alternatif.department}
                    </span>
                    <p class="text-gray-700 mt-3">${data.jurusan_alternatif.description}</p>
                    <button type="button" class="redirect-btn bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-5 py-2 mt-4 rounded-xl shadow-md hover:from-orange-600 hover:to-red-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-major="${data.jurusan_alternatif.name}">
                        Lihat Selengkapnya →
                    </button>
                </div>
            </div>
            `;

                        // Tambahkan event listener untuk tombol setelah mereka dibuat
                        setTimeout(() => {
                            document.querySelectorAll('.redirect-btn').forEach(button => {
                                button.addEventListener('click', function() {
                                    const majorName = this.getAttribute(
                                        'data-major');
                                    redirectToMajor(majorName);
                                });
                            });
                        }, 100);

                    } else {
                        resultContent.innerHTML = `
            <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <h3 class="text-lg font-semibold text-yellow-800">Format Response Tidak Dikenal</h3>
                <p class="text-yellow-700 mt-2">Silakan coba lagi dengan kata kunci yang berbeda.</p>
            </div>
            `;
                    }

                    leftContent.classList.add('hidden');
                    resultContainer.classList.remove('hidden');
                    form.classList.add('hidden');
                    resetContainer.classList.remove('hidden');

                } catch (error) {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan: " + error.message);
                } finally {
                    submitButton.disabled = false;
                    submitButton.textContent = 'DAPATKAN REKOMENDASI';
                }
            });

            // Fungsi redirect yang baru
            function redirectToMajor(majorName) {
                console.log('Redirecting to major:', majorName); // Debug

                // Simpan jurusan yang dipilih ke localStorage
                localStorage.setItem('selectedMajor', majorName);

                // Redirect ke halaman jurusan
                window.location.href = '/program/jurusan';
            }

            // Fungsi redirect umum (untuk tombol yang sudah ada)
            function redirect() {
                window.location.href = "/program/jurusan";
            }

            // Reset button
            resetButton.addEventListener('click', function() {
                leftContent.classList.remove('hidden');
                resultContainer.classList.add('hidden');
                form.classList.remove('hidden');
                resetContainer.classList.add('hidden');
                keywordInput.value = '';
            });
        });
    </script>
    <!-- ==Carousel Departemen (Stacked)== -->
    <section class="w-full py-16 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bebas text-gray-900 mb-2">
                    <span class="text-black">4 Departemen Unggulan</span>
                    <span class="text-orange-500"> SKARIGA</span>
                </h2>
            </div>

            <!-- Carousel Container -->
            <div class="relative w-full max-w-4xl mx-auto">
                <div class="overflow-visible h-96 md:h-80">
                    <div class="card-container relative h-full">
                        <!-- Card Loop - TANPA INLINE STYLE -->
                        <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700"
                            data-index="0">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="md:w-2/5">
                                    <img src="{{ asset('assets/Depart1.png') }}" alt="TIK"
                                        class="w-full h-40 md:h-full object-cover">
                                </div>
                                <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3 md:mb-4">
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">TIK</h3>
                                            <span
                                                class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">
                                                Teknologi Informasi & Komunikasi
                                            </span>
                                        </div>
                                        <p
                                            class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">
                                            Departemen TIK membekali siswa dengan keterampilan di bidang teknologi
                                            informasi,
                                            meliputi pemrograman, desain web, jaringan komputer, dan manajemen data.
                                        </p>
                                    </div>

                                    <a href="/program/jurusan"
                                        class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">
                                        Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700"
                            data-index="1">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="md:w-2/5">
                                    <img src="{{ asset('assets/Depart2.png') }}" alt="Pemesinan"
                                        class="w-full h-40 md:h-full object-cover">
                                </div>
                                <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3 md:mb-4">
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">Pemesinan</h3>
                                            <span
                                                class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">
                                                Teknik Pemesinan
                                            </span>
                                        </div>
                                        <p
                                            class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">
                                            Membekali siswa menguasai teknik mesin konvensional dan CNC, membaca gambar
                                            teknik,
                                            serta proses manufaktur industri.
                                        </p>
                                    </div>
                                    <a href="/program/jurusan"
                                        class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">
                                        Selengkapnya →
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700"
                            data-index="2">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="md:w-2/5">
                                    <img src="{{ asset('assets/Depart3.png') }}" alt="Kelistrikan"
                                        class="w-full h-40 md:h-full object-cover">
                                </div>
                                <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3 md:mb-4">
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">Kelistrikan</h3>
                                            <span
                                                class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">
                                                Teknik Kelistrikan
                                            </span>
                                        </div>
                                        <p
                                            class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">
                                            Mengajarkan keterampilan instalasi, perawatan, dan sistem kontrol listrik
                                            untuk bangunan dan industri.
                                        </p>
                                    </div>
                                    <a href="/program/jurusan"
                                        class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">
                                        Selengkapnya →
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700"
                            data-index="3">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="md:w-2/5">
                                    <img src="{{ asset('assets/Depart4.png') }}" alt="Otomotif"
                                        class="w-full h-40 md:h-full object-cover">
                                </div>
                                <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3 md:mb-4">
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900">Otomotif</h3>
                                            <span
                                                class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">
                                                Teknik Otomotif
                                            </span>
                                        </div>
                                        <p
                                            class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">
                                            Fokus pada teknologi kendaraan bermotor, perawatan, dan sistem permesinan modern
                                            yang memenuhi kebutuhan industri.
                                        </p>
                                    </div>
                                    <a href="/program/jurusan"
                                        class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">
                                        Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dots -->
                <div class="flex justify-center mt-8 md:mt-12 space-x-2">
                    <button class="dot w-6 h-3 rounded-full bg-orange-500" data-index="0"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="1"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="2"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="3"></button>
                </div>

                <div class="text-center mt-4 text-gray-500 text-sm">
                    Geser atau klik untuk melihat departemen lainnya
                </div>
            </div>
        </div>
    </section>
    <!-- == Kerjasama Industri == -->
    <section class="w-full bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-5xl font-bebas text-gray-900 text-center mb-12">
                KERJASAMA <span class="text-orange-500">INDUSTRI</span>
            </h2>



            <!-- Slider Baris 2 (arah sebaliknya) -->
            <div class="swiper industriSwiper2">
                <div class="swiper-wrapper flex items-center">
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/jatim.png') }}" class="h-16 object-contain" alt="LG" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/jaghos.png') }}" class="h-16 object-contain" alt="Alfamart" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/asco.png') }}" class="h-16 object-contain" alt="Daihatsu" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/japfa.png') }}" class="h-16 object-contain" alt="PJB" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/crpu.png') }}" class="h-16 object-contain" alt="B&D" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/radar.png') }}" class="h-16 object-contain" alt="Indonesia Power" />
                    </div>
                </div>
            </div>

            <!-- Slider Baris 1 -->
            <div class="swiper industriSwiper1 mb-10">
                <div class="swiper-wrapper flex items-center">
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/lg.png') }}" class="h-16 object-contain" alt="LG" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/alfamart.png') }}" class="h-16 object-contain" alt="Alfamart" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/daihatsu.png') }}" class="h-16 object-contain" alt="Daihatsu" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/pjb.png') }}" class="h-16 object-contain" alt="PJB" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/bd.png') }}" class="h-16 object-contain" alt="B&D" />
                    </div>
                    <div class="swiper-slide-industri flex justify-center items-center">
                        <img src="{{ asset('assets/indonesia-power.png') }}" class="h-16 object-contain"
                            alt="Indonesia Power" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Fungsi untuk redirect ke halaman jurusan dengan departemen spesifik
        function redirectToDepartment(departmentName) {
            console.log('Redirecting to department:', departmentName);

            // Simpan departemen yang dipilih ke localStorage
            localStorage.setItem('selectedDepartment', departmentName);

            // Hapus rekomendasi jurusan jika ada (opsional)
            localStorage.removeItem('selectedMajor');
            localStorage.removeItem('recommendedMajors');

            // Redirect ke halaman jurusan
            window.location.href = '/program/jurusan';
        }

        // Event listener untuk tombol departemen
        document.addEventListener('DOMContentLoaded', function() {
            const departmentButtons = document.querySelectorAll('.redirect-department');

            departmentButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const departmentName = this.getAttribute('data-department');
                    redirectToDepartment(departmentName);
                });
            });
        });

        // Fungsi untuk redirect ke halaman jurusan dengan departemen spesifik
        function redirectToDepartment(departmentName) {
            // Simpan departemen yang dipilih ke localStorage
            localStorage.setItem('selectedDepartment', departmentName);

            // Redirect ke halaman jurusan
            window.location.href = '/program/jurusan';
        }

        // Event listener untuk tombol departemen
        document.addEventListener('DOMContentLoaded', function() {
            const departmentButtons = document.querySelectorAll('.redirect-department');

            departmentButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const departmentName = this.getAttribute('data-department');
                    redirectToDepartment(departmentName);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Baris 1 (arah ke kanan)
            new Swiper(".industriSwiper1", {
                slidesPerView: 4,
                slideClass: 'swiper-slide-industri',
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                speed: 3000,
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30
                    },
                },
            });

            // Baris 2 (arah ke kiri → pakai reverse)
            new Swiper(".industriSwiper2", {
                slidesPerView: 4,
                slideClass: 'swiper-slide-industri',
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    reverseDirection: true, // jalan ke kiri
                },
                speed: 3000,
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30
                    },
                },
            });
        });

        // Stack Card Departemen - Improved Version dengan responsive
        const cards = document.querySelectorAll('.card');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;
        let isDragging = false;
        let startX = 0;
        let currentX = 0;
        let dragThreshold = 80;
        let animationFrameId = null;

        function initializeCarousel() {
            const isMobile = window.innerWidth < 768;

            cards.forEach((card, index) => {
                const cardIndex = parseInt(card.getAttribute('data-index'));
                const position = (cardIndex - currentIndex + cards.length) % cards.length;

                // Hapus semua inline style dan reset ke CSS class
                card.removeAttribute('style');

                // Hapus semua class posisi sebelumnya
                card.classList.remove('card-active', 'card-behind', 'card-far-behind', 'card-more-behind');

                // Di mobile, hanya tampilkan card aktif
                if (isMobile) {
                    if (position === 0) {
                        card.classList.add('card-active');
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                } else {
                    // Di desktop, tampilkan semua card dengan efek stacked
                    card.style.display = 'block';
                    if (position === 0) {
                        card.classList.add('card-active');
                    } else if (position === 1) {
                        card.classList.add('card-behind');
                    } else if (position === 2) {
                        card.classList.add('card-far-behind');
                    } else if (position === 3) {
                        card.classList.add('card-more-behind');
                    }
                }
            });

            updateDots();
        }

        function updateDots() {
            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.remove('w-3', 'bg-gray-300');
                    dot.classList.add('w-6', 'bg-orange-500');
                } else {
                    dot.classList.remove('w-6', 'bg-orange-500');
                    dot.classList.add('w-3', 'bg-gray-300');
                }
            });
        }

        // Dot indicators dengan animasi smooth
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                if (index !== currentIndex) {
                    navigateTo(index);
                }
            });
        });

        // Event listeners dengan passive false untuk performa better
        cards.forEach(card => {
            card.addEventListener('touchstart', handleTouchStart, {
                passive: false
            });
            card.addEventListener('touchmove', handleTouchMove, {
                passive: false
            });
            card.addEventListener('touchend', handleTouchEnd);

            card.addEventListener('mousedown', handleMouseDown);
            card.addEventListener('mousemove', handleMouseMove);
            card.addEventListener('mouseup', handleMouseUp);
            card.addEventListener('mouseleave', handleMouseUp);
        });

        function handleTouchStart(e) {
            startX = e.touches[0].clientX;
            isDragging = true;
            cards.forEach(card => card.style.transition = 'none');
            e.preventDefault();
        }

        function handleTouchMove(e) {
            if (!isDragging) return;

            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }

            animationFrameId = requestAnimationFrame(() => {
                currentX = e.touches[0].clientX;
                updateDragPosition();
            });
            e.preventDefault();
        }

        function handleTouchEnd() {
            if (!isDragging) return;
            finishDrag();
        }

        function handleMouseDown(e) {
            startX = e.clientX;
            isDragging = true;
            cards.forEach(card => card.style.transition = 'none');
            document.body.style.cursor = 'grabbing';
            e.preventDefault();
        }

        function handleMouseMove(e) {
            if (!isDragging) return;

            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }

            animationFrameId = requestAnimationFrame(() => {
                currentX = e.clientX;
                updateDragPosition();
            });
        }

        function handleMouseUp() {
            if (!isDragging) return;
            finishDrag();
        }

        function updateDragPosition() {
            const isMobile = window.innerWidth < 768;
            const diffX = currentX - startX;
            const progress = Math.min(Math.abs(diffX) / 300, 1); // Normalize progress 0-1

            cards.forEach((card, index) => {
                const cardIndex = parseInt(card.getAttribute('data-index'));
                const position = (cardIndex - currentIndex + cards.length) % cards.length;

                // Di mobile, hanya beri efek pada card aktif
                if (isMobile && position !== 0) return;

                // Untuk efek drag, kita tetap gunakan inline style
                // Tapi hanya untuk transform dan opacity, biarkan class untuk z-index dan filter
                if (position === 0) {
                    const scale = isMobile ? 1 - (progress * 0.05) : 1 - (progress * 0.08);
                    const opacity = isMobile ? 1 - (progress * 0.2) : 1 - (progress * 0.3);
                    card.style.transform = `translateX(${diffX}px) scale(${scale}) rotateY(${diffX * 0.1}deg)`;
                    card.style.opacity = opacity;
                } else if (position === 1 && !isMobile) {
                    const baseX = 80 + (diffX > 0 ? Math.min(diffX * 0.8, 80) : Math.max(diffX * 0.8, -30));
                    const scale = 0.92 - (progress * 0.08);
                    const opacity = 0.85 - (progress * 0.25);
                    card.style.transform = `translateX(${baseX}px) scale(${scale}) rotateY(${diffX * 0.08 - 5}deg)`;
                    card.style.opacity = opacity;
                } else if (position === 2 && !isMobile) {
                    const baseX = 160 + (diffX > 0 ? Math.min(diffX * 0.6, 60) : Math.max(diffX * 0.6, -20));
                    const scale = 0.84 - (progress * 0.08);
                    const opacity = 0.7 - (progress * 0.2);
                    card.style.transform = `translateX(${baseX}px) scale(${scale}) rotateY(${diffX * 0.06 - 8}deg)`;
                    card.style.opacity = opacity;
                } else if (position === 3 && !isMobile) {
                    const baseX = 240 + (diffX > 0 ? Math.min(diffX * 0.4, 40) : Math.max(diffX * 0.4, -10));
                    const scale = 0.76 - (progress * 0.06);
                    const opacity = 0.5 - (progress * 0.15);
                    card.style.transform =
                    `translateX(${baseX}px) scale(${scale}) rotateY(${diffX * 0.04 - 10}deg)`;
                    card.style.opacity = opacity;
                }
            });
        }

        function finishDrag() {
            isDragging = false;
            document.body.style.cursor = '';

            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }

            const diffX = currentX - startX;

            // Enhanced swipe detection dengan hysteresis
            if (Math.abs(diffX) > dragThreshold) {
                if (diffX > 0) {
                    // Swipe right - go to previous
                    navigateTo(currentIndex - 1);
                } else {
                    // Swipe left - go to next
                    navigateTo(currentIndex + 1);
                }
            } else {
                // Snap back to current position - gunakan initializeCarousel untuk kembali ke CSS class
                initializeCarousel();
            }
        }

        function navigateTo(index) {
            // Smooth circular navigation
            if (index < 0) index = cards.length - 1;
            if (index >= cards.length) index = 0;

            // Add subtle animation delay based on direction
            const direction = index > currentIndex ? 1 : -1;

            cards.forEach((card, i) => {
                const delay = Math.abs(i - currentIndex) * 0.05;
                card.style.transition = `all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) ${delay}s`;
            });

            currentIndex = index;
            initializeCarousel();
        }

        // Initialize dengan delay untuk animasi masuk yang smooth
        setTimeout(() => {
            initializeCarousel();
        }, 100);

        // Handle window resize
        window.addEventListener('resize', initializeCarousel);
    </script>
@endsection
