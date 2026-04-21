<x-layout title="SMK PGRI 3 Malang - Success by Discipline">
@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', cursive; }
    .font-poppins { font-family: 'Poppins', sans-serif; }
    .card-active { transform: translateX(0) scale(1); opacity: 1; transition: all 0.4s ease; }
    .card-behind { transform: translateX(80px) scale(0.9); opacity: 0.9; transition: all 0.4s ease; }
    .card-far-behind { transform: translateX(160px) scale(0.8); opacity: 0.7; transition: all 0.4s ease; }
    .card-more-behind { transform: translateX(240px) scale(0.7); opacity: 0.5; transition: all 0.4s ease; }
    .bg-circle { position: absolute; width: 20rem; height: 20rem; border-radius: 50%; opacity: 0.7; z-index: -1; }
    @media (min-width: 1024px) { .bg-circle { width: 28rem; height: 28rem; } }
    .bg-orange-blur { background: rgba(255, 179, 132, 0.6); }
    .bg-blue-blur { background: rgba(174, 219, 228, 0.6); }
    .swiper-slide { position: relative; }
    .swiper-slide::after { content: ""; position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)); z-index: 1; }
    .swiper-slide>div { position: relative; z-index: 0; }
    .swiper-slide-industri { width: auto; flex-shrink: 0; }
    .card-active { transform: translateX(0) scale(1); opacity: 1; z-index: 40; filter: brightness(1); transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .card-behind { transform: translateX(100px) scale(0.92); opacity: 1; z-index: 30; filter: brightness(0.9); transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .card-far-behind { transform: translateX(200px) scale(0.84); opacity: 1; z-index: 20; filter: brightness(0.8); transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .card-more-behind { transform: translateX(300px) scale(0.76); opacity: 1; z-index: 10; filter: brightness(0.7); transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    @media (max-width: 768px) {
        .card-container { height: auto !important; min-height: 400px; }
        .card { height: auto !important; min-height: 380px; margin-bottom: 20px; }
        .card .flex { flex-direction: column; height: auto; }
        .card img { height: 200px !important; width: 100% !important; }
        .card .p-6 { padding: 1.5rem !important; }
        .redirect-department { width: 100%; text-align: center; padding: 12px 16px !important; font-size: 14px !important; margin-top: 1rem; }
        .card-active { transform: translateX(0) scale(1) !important; position: relative !important; margin: 0 auto; }
        .card-behind, .card-far-behind, .card-more-behind { display: none !important; }
    }
    @media (max-width: 640px) { .card { min-height: 350px; } .card img { height: 180px !important; } .card .p-6 { padding: 1rem !important; } .card h3 { font-size: 1.5rem !important; } .card p { font-size: 0.9rem; line-height: 1.5; } }
    @media (max-width: 480px) { .card { min-height: 320px; margin-bottom: 15px; } .card img { height: 160px !important; } .redirect-department { padding: 10px 14px !important; font-size: 13px !important; } }
    .redirect-department { position: relative !important; z-index: 50 !important; opacity: 1 !important; visibility: visible !important; }
</style>
@endpush

<div class="relative overflow-hidden bg-white">
    <div class="relative bg-gradient-to-r text-white">
        <div class="absolute inset-0 z-0">
            <div class="swiper-container h-[460px] w-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><div class="w-full h-[450px] bg-cover bg-center" style="background-image: url('{{ $assetBase }}/assets/Hero1.jpeg')"></div></div>
                    <div class="swiper-slide"><div class="w-full h-[450px] bg-cover bg-center" style="background-image: url('{{ $assetBase }}/assets/Hero4.png')"></div></div>
                    <div class="swiper-slide"><div class="w-full h-[450px] bg-cover bg-center" style="background-image: url('{{ $assetBase }}/assets/Hero3.png')"></div></div>
                </div>
            </div>
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        <div class="relative z-10 container mx-auto px-4 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-center md:text-left">
                    <div class="mb-6">
                        <h1 class="text-6xl md:text-4xl lg:text-6xl font-bebas mb-4 leading-tight text-orange-500">SUCCESS BY<br><span class="text-white">DISCIPLINE</span></h1>
                        <p class="text-xl md:text-2xl text-blue-100 mb-6">Membentuk siswa cerdas, terampil, dan berkarakter</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="/profile" class="flex justify-center md:block">
                            <button class="border-2 border-white text-white hover:bg-orange-600 hover:text-white hover:scale-105 hover:shadow-lg px-8 py-3 rounded-lg font-semibold transition-all flex items-center justify-center">Profile</button>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl"><div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">1000+</div><div class="text-white">Siswa Aktif</div></div>
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl"><div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">50+</div><div class="text-white">Guru Berpengalaman</div></div>
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl"><div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">16</div><div class="text-white">Program Jurusan</div></div>
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center border border-white border-opacity-20 hover:scale-105 hover:shadow-xl"><div class="text-3xl md:text-4xl font-bold text-orange-500 mb-2">100+</div><div class="text-white">Kerjaan Sama Industri</div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 pointer-events-none z-0">
        <div class="bg-blue-blur bg-circle -left-32 -top-1/4"></div>
        <div class="bg-blue-blur bg-circle -left-28 top-1/3"></div>
        <div class="bg-orange-blur bg-circle -right-32 top-1/4"></div>
        <div class="bg-orange-blur bg-circle -right-28 bottom-40"></div>
    </div>

    <section class="relative z-10 w-full py-16 bg-transparent flex justify-center">
        <div class="w-full max-w-6xl px-4 flex flex-col lg:flex-row gap-12">
            <div class="w-full lg:w-2/5 flex flex-col justify-center">
                <div id="leftContent">
                    <h2 class="text-5xl md:text-6xl font-bebas text-gray-900 mb-4">TEMUKAN JURUSAN</h2>
                    <div class="text-4xl md:text-5xl font-bebas text-orange-400 mb-6">YANG COCOK UNTUKMU</div>
                    <p class="text-lg text-gray-700 mb-6">Masih bingung memilih jurusan? Ceritakan apa yang kamu ketahui, bakat, atau passion-mu, dan kami akan rekomendasikan jurusan yang paling sesuai!</p>
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                        <h4 class="font-semibold text-blue-800 mb-2 flex items-center"><i class="fas fa-lightbulb mr-2 text-orange-500"></i>Contoh yang bisa kamu tulis:</h4>
                        <div class="text-sm text-blue-700 space-y-1">
                            <div>• "Saya suka coding dan buat aplikasi"</div>
                            <div>• "Suka otak-atik mesin dan elektronik"</div>
                            <div>• "Hobi desain grafis dan editing video"</div>
                            <div>• "Tertarik dengan jaringan komputer"</div>
                            <div>• "Suka bekerja dengan tangan dan alat"</div>
                        </div>
                    </div>
                </div>
                <div id="resultContainer" class="hidden bg-gradient-to-br from-blue-50 to-orange-50 p-8 rounded-2xl shadow-lg border border-orange-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">REKOMENDASI JURUSAN</h2>
                    <div class="w-20 h-1 bg-orange-500 mb-6"></div>
                    <div id="resultContent" class="space-y-6"></div>
                </div>
            </div>
            <div class="w-full lg:w-3/5 flex flex-col items-center">
                <form id="recommendationForm" class="w-full max-w-md bg-white rounded-2xl shadow-xl hover:shadow-2xl p-8 mb-8 border border-gray-100">
                    <div class="text-center mb-2">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-graduation-cap text-orange-500 text-2xl"></i></div>
                        <h3 class="text-3xl font-bebas text-gray-800 mb-2">APA YANG KAMU <span class="text-4xl text-orange-500">SUKA?</span></h3>
                        <p class="text-gray-600 text-sm mb-6">Tuliskan apa yang kamu sukai, pelajaran favorit, atau cita-citamu</p>
                    </div>
                    <div class="mb-6 relative">
                        <textarea id="keywordInput" name="keyword" placeholder="Bingung? coba tuliskan apa yang kamu ketahui disini" class="w-full p-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none h-32" rows="4" required></textarea>
                    </div>
                    <button type="submit" id="submitButton" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-2 rounded-xl font-semibold text-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-search mr-3"></i>DAPATKAN REKOMENDASI
                    </button>
                </form>
                <div id="resetContainer" class="w-full max-w-md text-center animate-fade-in hidden">
                    <div class="bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-lg border border-green-200">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-redo text-green-500 text-xl"></i></div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Coba Rekomendasi Lain</h3>
                        <p class="text-gray-600 mb-6">Ingin menjelajahi jurusan lainnya? Klik tombol di bawah untuk mencari rekomendasi baru.</p>
                        <button id="resetButton" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-sync-alt mr-2"></i>Cari Rekomendasi Lain
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="relative z-10 bg-transparent py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-bebas text-gray-800 mb-4">Kenapa harus <span class="text-blue-500">SKARIGA?</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Sekolah Kejuruan Unggulan yang berfokus pada pengembangan potensi siswa melalui pendidikan berkualitas dan pembentukan karakter disiplin.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500"><div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-book-open text-blue-600 text-2xl"></i></div><h3 class="text-xl font-semibold text-gray-800 mb-2">Kurikulum Modern</h3><p class="text-gray-600">Kurikulum terupdate yang sesuai dengan kebutuhan industri masa kini.</p></div>
                <div class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500"><div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-laptop-code text-orange-600 text-2xl"></i></div><h3 class="text-xl font-semibold text-gray-800 mb-2">Fasilitas Lengkap</h3><p class="text-gray-600">Laboratorium dan peralatan modern untuk mendukung pembelajaran praktis.</p></div>
                <div class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500"><div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-user-graduate text-blue-600 text-2xl"></i></div><h3 class="text-xl font-semibold text-gray-800 mb-2">Bimbingan Karir</h3><p class="text-gray-600">Program bimbingan karir untuk mempersiapkan siswa memasuki dunia kerja.</p></div>
            </div>
        </div>
    </div>

    <div class="bg-transparent py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-bebas text-gray-800 mb-4">PEMBELAJARAN <span class="text-orange-500">PRAKTIS</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Metode pembelajaran yang mengutamakan praktek langsung dan pengalaman nyata.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500"><i class="fas fa-tools text-4xl text-blue-600 mb-4"></i><h3 class="text-lg font-semibold mb-2">Workshop</h3><p class="text-gray-600">Sesi praktik langsung dengan alat dan materi nyata.</p></div>
                <div class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500"><i class="fas fa-industry text-4xl text-orange-600 mb-4"></i><h3 class="text-lg font-semibold mb-2">Industry Visit</h3><p class="text-gray-600">Kunjungan langsung ke industri untuk belajar praktik terbaik.</p></div>
                <div class="bg-blue-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-blue-500"><i class="fas fa-handshake text-4xl text-blue-600 mb-4"></i><h3 class="text-lg font-semibold mb-2">Magang</h3><p class="text-gray-600">Program magang untuk pengalaman kerja langsung.</p></div>
                <div class="bg-orange-50 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border-l-8 border-orange-500"><i class="fas fa-project-diagram text-4xl text-orange-600 mb-4"></i><h3 class="text-lg font-semibold mb-2">Project Based</h3><p class="text-gray-600">Pembelajaran melalui proyek nyata yang menantang.</p></div>
            </div>
        </div>
    </div>
</div>

<section class="w-full py-16 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bebas text-gray-900 mb-2"><span class="text-black">4 Departemen Unggulan</span> <span class="text-orange-500">SKARIGA</span></h2>
        </div>
        <div class="relative w-full max-w-4xl mx-auto">
            <div class="overflow-visible h-96 md:h-80">
                <div class="card-container relative h-full">
                    <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700" data-index="0">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="md:w-2/5"><img src="{{ $assetBase }}/assets/Depart1.png" alt="TIK" class="w-full h-40 md:h-full object-cover"></div>
                            <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3 md:mb-4"><h3 class="text-xl md:text-2xl font-bold text-gray-900">TIK</h3><span class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">Teknologi Informasi & Komunikasi</span></div>
                                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">Departemen TIK membekali siswa dengan keterampilan di bidang teknologi informasi, meliputi pemrograman, desain web, jaringan komputer, dan manajemen data.</p>
                                </div>
                                <a href="/program/jurusan" class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700" data-index="1">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="md:w-2/5"><img src="{{ $assetBase }}/assets/Depart2.png" alt="Pemesinan" class="w-full h-40 md:h-full object-cover"></div>
                            <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3 md:mb-4"><h3 class="text-xl md:text-2xl font-bold text-gray-900">Pemesinan</h3><span class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">Teknik Pemesinan</span></div>
                                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">Membekali siswa menguasai teknik mesin konvensional dan CNC, membaca gambar teknik, serta proses manufaktur industri.</p>
                                </div>
                                <a href="/program/jurusan" class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700" data-index="2">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="md:w-2/5"><img src="{{ $assetBase }}/assets/Depart3.png" alt="Kelistrikan" class="w-full h-40 md:h-full object-cover"></div>
                            <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3 md:mb-4"><h3 class="text-xl md:text-2xl font-bold text-gray-900">Kelistrikan</h3><span class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">Teknik Kelistrikan</span></div>
                                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">Mengajarkan keterampilan instalasi, perawatan, dan sistem kontrol listrik untuk bangunan dan industri.</p>
                                </div>
                                <a href="/program/jurangan" class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="card absolute inset-0 bg-white rounded-2xl shadow-lg overflow-hidden h-80 md:h-72 transition-all duration-700" data-index="3">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="md:w-2/5"><img src="{{ $assetBase }}/assets/Depart4.png" alt="Otomotif" class="w-full h-40 md:h-full object-cover"></div>
                            <div class="md:w-3/5 p-4 md:p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3 md:mb-4"><h3 class="text-xl md:text-2xl font-bold text-gray-900">Otomotif</h3><span class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">Teknik Otomotif</span></div>
                                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base line-clamp-3 md:line-clamp-none">Fokus pada teknologi kendaraan bermotor, perawatan, dan sistem permesinan modern yang memenuhi kebutuhan industri.</p>
                                </div>
                                <a href="/program/jurusan" class="redirect-department self-start bg-orange-500 text-white px-4 md:px-6 py-2 md:py-2 rounded-lg text-xs md:text-sm font-semibold hover:bg-orange-600 transition w-full md:w-auto text-center">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8 md:mt-12 space-x-2">
                <button class="dot w-6 h-3 rounded-full bg-orange-500" data-index="0"></button>
                <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="1"></button>
                <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="2"></button>
                <button class="dot w-3 h-3 rounded-full bg-gray-300" data-index="3"></button>
            </div>
            <div class="text-center mt-4 text-gray-500 text-sm">Geser atau klik untuk melihat departemen lainnya</div>
        </div>
    </div>
</section>

<section class="w-full bg-white py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-5xl font-bebas text-gray-900 text-center mb-12">KERJASAMA <span class="text-orange-500">INDUSTRI</span></h2>
        <div class="swiper industriSwiper2 mb-10">
            <div class="swiper-wrapper flex items-center">
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/jatim.png" class="h-16 object-contain" alt="LG"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/jaghos.png" class="h-16 object-contain" alt="Alfamart"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/asco.png" class="h-16 object-contain" alt="Daihatsu"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/japfa.png" class="h-16 object-contain" alt="PJB"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/crpu.png" class="h-16 object-contain" alt="B&D"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/radar.png" class="h-16 object-contain" alt="Indonesia Power"></div>
            </div>
        </div>
        <div class="swiper industriSwiper1">
            <div class="swiper-wrapper flex items-center">
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/lg.png" class="h-16 object-contain" alt="LG"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/alfamart.png" class="h-16 object-contain" alt="Alfamart"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/daihatsu.png" class="h-16 object-contain" alt="Daihatsu"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/pjb.png" class="h-16 object-contain" alt="PJB"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/bd.png" class="h-16 object-contain" alt="B&D"></div>
                <div class="swiper-slide-industri flex justify-center items-center"><img src="{{ $assetBase }}/assets/indonesia-power.png" class="h-16 object-contain" alt="Indonesia Power"></div>
            </div>
        </div>
    </div>
</section>

<script>
function redirect() { window.location.href = "/program/jurusan"; }
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('recommendationForm');
    const keywordInput = document.getElementById('keywordInput');
    const keywordDropdown = document.getElementById('keywordDropdown');
    const submitButton = document.getElementById('submitButton');
    const resetButton = document.getElementById('resetButton');
    const leftContent = document.getElementById('leftContent');
    const resultContainer = document.getElementById('resultContainer');
    const resultContent = document.getElementById('resultContent');
    const resetContainer = document.getElementById('resetContainer');

    if(keywordInput && keywordDropdown) {
        keywordInput.addEventListener('focus', function() { keywordDropdown.classList.remove('hidden'); });
        keywordInput.addEventListener('blur', function() { setTimeout(() => { keywordDropdown.classList.add('hidden'); }, 200); });
    }

    if(form && submitButton) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            submitButton.disabled = true;
            submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';
            try {
                const response = await fetch("/api/gemini", { method: "POST", headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") }, body: JSON.stringify({ keyword: keywordInput.value }) });
                const data = await response.json();
                if (!response.ok) throw new Error(data.error || 'Terjadi kesalahan');
                if (data.jurusan_utama && data.jurusan_utama.name === "Tidak ditemukan") {
                    resultContent.innerHTML = '<div class="p-6 bg-red-50 border border-red-200 rounded-lg mb-4"><h3 class="text-xl font-semibold text-red-800 mb-2">' + data.jurusan_utama.name + '</h3><p class="text-red-700">' + data.jurusan_utama.description + '</p></div>';
                } else if (data.jurusan_utama && data.jurusan_alternatif) {
                    localStorage.setItem('recommendedMajors', JSON.stringify({ utama: data.jurusan_utama, alternatif: data.jurusan_alternatif, timestamp: Date.now(), expiresIn: 30000 }));
                    resultContent.innerHTML = '<div class="mb-6"><h3 class="text-lg font-semibold text-blue-800 mb-2">Jurusan Utama:</h3><div class="p-4 bg-blue-50 border border-blue-200 rounded-lg"><h4 class="text-xl font-bold text-gray-900">' + data.jurusan_utama.name + '</h4><span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mt-2">' + data.jurusan_utama.department + '</span><p class="text-gray-700 mt-3">' + data.jurusan_utama.description + '</p><button type="button" class="redirect-btn bg-orange-500 text-white font-medium px-4 py-2 mt-4 rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1" data-major="' + data.jurusan_utama.name + '">Lihat Selengkapnya →</button></div></div><div><h3 class="text-lg font-semibold text-green-800 mb-2">Jurusan Alternatif:</h3><div class="p-4 bg-green-50 border border-green-200 rounded-lg"><h4 class="text-xl font-bold text-gray-900">' + data.jurusan_alternatif.name + '</h4><span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-2">' + data.jurusan_alternatif.department + '</span><p class="text-gray-700 mt-3">' + data.jurusan_alternatif.description + '</p><button type="button" class="redirect-btn bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-5 py-2 mt-4 rounded-xl shadow-md hover:from-orange-600 hover:to-red-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-major="' + data.jurusan_alternatif.name + '">Lihat Selengkapnya →</button></div></div>';
                    setTimeout(() => { document.querySelectorAll('.redirect-btn').forEach(button => { button.addEventListener('click', function() { localStorage.setItem('selectedMajor', this.getAttribute('data-major')); window.location.href = '/program/jurusan'; }); }); }, 100);
                } else { resultContent.innerHTML = '<div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg"><h3 class="text-lg font-semibold text-yellow-800">Format Response Tidak Dikenal</h3><p class="text-yellow-700 mt-2">Silakan coba lagi dengan kata kunci yang berbeda.</p></div>'; }
                leftContent.classList.add('hidden'); resultContainer.classList.remove('hidden'); form.classList.add('hidden'); resetContainer.classList.remove('hidden');
            } catch (error) { console.error('Error:', error); alert("Terjadi kesalahan: " + error.message); } finally { submitButton.disabled = false; submitButton.textContent = 'DAPATKAN REKOMENDASI'; }
        });
    }

    if(resetButton && keywordInput) {
        resetButton.addEventListener('click', function() { leftContent.classList.remove('hidden'); resultContainer.classList.add('hidden'); form.classList.remove('hidden'); resetContainer.classList.add('hidden'); keywordInput.value = ''; });
    }

    if(typeof Swiper !== 'undefined') {
        new Swiper(".industriSwiper1", { slidesPerView: 4, slideClass: 'swiper-slide-industri', spaceBetween: 30, loop: true, autoplay: { delay: 0, disableOnInteraction: false }, speed: 3000, breakpoints: { 320: { slidesPerView: 2, spaceBetween: 20 }, 640: { slidesPerView: 3, spaceBetween: 20 }, 1024: { slidesPerView: 5, spaceBetween: 30 } } });
        new Swiper(".industriSwiper2", { slidesPerView: 4, slideClass: 'swiper-slide-industri', spaceBetween: 30, loop: true, autoplay: { delay: 0, disableOnInteraction: false, reverseDirection: true }, speed: 3000, breakpoints: { 320: { slidesPerView: 2, spaceBetween: 20 }, 640: { slidesPerView: 3, spaceBetween: 20 }, 1024: { slidesPerView: 5, spaceBetween: 30 } } });
    }

    const cards = document.querySelectorAll('.card');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0, isDragging = false, startX = 0, currentX = 0, dragThreshold = 80, animationFrameId = null;

    function initializeCarousel() {
        const isMobile = window.innerWidth < 768;
        cards.forEach((card, index) => {
            const cardIndex = parseInt(card.getAttribute('data-index'));
            const position = (cardIndex - currentIndex + cards.length) % cards.length;
            card.removeAttribute('style');
            card.classList.remove('card-active', 'card-behind', 'card-far-behind', 'card-more-behind');
            if (isMobile) {
                if (position === 0) { card.classList.add('card-active'); card.style.display = 'block'; }
                else { card.style.display = 'none'; }
            } else {
                card.style.display = 'block';
                if (position === 0) card.classList.add('card-active');
                else if (position === 1) card.classList.add('card-behind');
                else if (position === 2) card.classList.add('card-far-behind');
                else if (position === 3) card.classList.add('card-more-behind');
            }
        });
        dots.forEach((dot, i) => { if (i === currentIndex) { dot.classList.remove('w-3', 'bg-gray-300'); dot.classList.add('w-6', 'bg-orange-500'); } else { dot.classList.remove('w-6', 'bg-orange-500'); dot.classList.add('w-3', 'bg-gray-300'); } });
    }

    function navigateTo(index) { if (index < 0) index = cards.length - 1; if (index >= cards.length) index = 0; currentIndex = index; initializeCarousel(); }

    dots.forEach((dot, index) => { dot.addEventListener('click', () => { if (index !== currentIndex) navigateTo(index); }); });

    cards.forEach(card => {
        card.addEventListener('touchstart', function(e) { startX = e.touches[0].clientX; isDragging = true; cards.forEach(c => c.style.transition = 'none'); e.preventDefault(); }, { passive: false });
        card.addEventListener('touchmove', function(e) { if (!isDragging) return; if (animationFrameId) cancelAnimationFrame(animationFrameId); animationFrameId = requestAnimationFrame(() => { currentX = e.touches[0].clientX; updateDragPosition(); }); e.preventDefault(); }, { passive: false });
        card.addEventListener('touchend', function() { if (!isDragging) return; finishDrag(); });
        card.addEventListener('mousedown', function(e) { startX = e.clientX; isDragging = true; cards.forEach(c => c.style.transition = 'none'); document.body.style.cursor = 'grabbing'; e.preventDefault(); });
        card.addEventListener('mousemove', function(e) { if (!isDragging) return; if (animationFrameId) cancelAnimationFrame(animationFrameId); animationFrameId = requestAnimationFrame(() => { currentX = e.clientX; updateDragPosition(); }); });
        card.addEventListener('mouseup', function() { if (!isDragging) return; finishDrag(); });
        card.addEventListener('mouseleave', function() { if (!isDragging) return; finishDrag(); });
    });

    function updateDragPosition() {
        const isMobile = window.innerWidth < 768;
        const diffX = currentX - startX;
        const progress = Math.min(Math.abs(diffX) / 300, 1);
        cards.forEach((card) => {
            const cardIndex = parseInt(card.getAttribute('data-index'));
            const position = (cardIndex - currentIndex + cards.length) % cards.length;
            if (isMobile && position !== 0) return;
            if (position === 0) { card.style.transform = 'translateX(' + diffX + 'px) scale(' + (isMobile ? 1 - progress * 0.05 : 1 - progress * 0.08) + ') rotateY(' + diffX * 0.1 + 'deg)'; card.style.opacity = isMobile ? 1 - progress * 0.2 : 1 - progress * 0.3; }
            else if (position === 1 && !isMobile) { card.style.transform = 'translateX(' + (80 + (diffX > 0 ? Math.min(diffX * 0.8, 80) : Math.max(diffX * 0.8, -30))) + 'px) scale(' + (0.92 - progress * 0.08) + ') rotateY(' + (diffX * 0.08 - 5) + 'deg)'; card.style.opacity = 0.85 - progress * 0.25; }
            else if (position === 2 && !isMobile) { card.style.transform = 'translateX(' + (160 + (diffX > 0 ? Math.min(diffX * 0.6, 60) : Math.max(diffX * 0.6, -20))) + 'px) scale(' + (0.84 - progress * 0.08) + ') rotateY(' + (diffX * 0.06 - 8) + 'deg)'; card.style.opacity = 0.7 - progress * 0.2; }
            else if (position === 3 && !isMobile) { card.style.transform = 'translateX(' + (240 + (diffX > 0 ? Math.min(diffX * 0.4, 40) : Math.max(diffX * 0.4, -10))) + 'px) scale(' + (0.76 - progress * 0.06) + ') rotateY(' + (diffX * 0.04 - 10) + 'deg)'; card.style.opacity = 0.5 - progress * 0.15; }
        });
    }

    function finishDrag() {
        isDragging = false;
        document.body.style.cursor = '';
        if (animationFrameId) cancelAnimationFrame(animationFrameId);
        const diffX = currentX - startX;
        if (Math.abs(diffX) > dragThreshold) { if (diffX > 0) navigateTo(currentIndex - 1); else navigateTo(currentIndex + 1); }
        else { initializeCarousel(); }
    }

    setTimeout(() => { initializeCarousel(); }, 100);
    window.addEventListener('resize', initializeCarousel);
});
</script>
</x-layout>