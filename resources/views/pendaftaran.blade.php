<x-layout title="Pendaftaran - SMK PGRI 3 Malang">
    <div class="bg-white text-gray-800">
        <div class="h-full h-max-content container mx-auto px-4 py-6">

            <!-- Hero Section -->
            <section class="relative h-[480px] md:h-[535px] mt-2 rounded-xl overflow-hidden">
                <div class="absolute inset-0">
                    <img src="{{ $assetBase . '/assets/header-pendaftaran.webp' }}" alt="Hero SKARIGA"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                </div>
                <div class="absolute bottom-8 left-4 md:left-10 z-10">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white drop-shadow-lg leading-tight">
                </div>
                <div class="absolute bottom-8 right-4 md:right-10 z-10 flex flex-col sm:flex-row gap-3">
                    <a href="https://wa.me/6282133000370"
                        class="btn-pend bg-gray-600 text-white px-6 sm:px-8 py-3 rounded-full text-base sm:text-lg font-semibold hover:bg-green-700 transition shadow-lg text-center">CHAT
                        ADMIN</a>
                    <button data-target="dafOn"
                        class="btn-pend bg-gray-500 text-white px-5 sm:px-6 py-3 rounded-full text-base sm:text-lg font-semibold hover:bg-orange-600 transition shadow-lg">DAFTAR
                        ONLINE</button>
                    <button data-target="dafOff"
                        class="btn-pend bg-gray-500 text-white px-5 sm:px-6 py-3 rounded-full text-base sm:text-lg font-semibold hover:bg-blue-600 transition shadow-lg">DAFTAR
                        OFFLINE</button>
                </div>
            </section>

            <!-- Grafik Section -->
            <!-- Grafik Section -->
            <section class="max-w-[104rem] mx-auto py-10 px-4 md:px-10">
                <div class="bg-white rounded-2xl shadow p-8 md:p-10 max-w-7xl mx-auto">
                    <!-- Judul -->
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold">
                            Perbandingan Pendaftar dan Peserta Diterima
                        </h2>
                    </div>

                    <!-- Wrapper Chart + Tabel -->
                    <div class="flex flex-col md:flex-row justify-center items-center md:items-center gap-10">
                        <!-- Chart -->
                        <div class="flex-1 flex justify-center">
                            <div class="relative w-full max-w-[700px] h-[400px]">
                                <canvas id="chartGabungan" class="w-full h-full"></canvas>
                            </div>
                        </div>

                        <!-- Tabel -->
                        <div class="w-full md:w-[35%] flex justify-center">
                            <div class="overflow-x-auto rounded-xl shadow-sm border border-gray-200 self-center">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th
                                                class="px-4 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-">
                                                Tahun</th>
                                            <th
                                                class="px-4 py-3 text-left text-sm font-semibold text-gray-700 uppercase">
                                                Pendaftar</th>
                                            <th
                                                class="px-4 py-3 text-left text-sm font-semibold text-gray-700 uppercase">
                                                Diterima</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($pendaftarans as $row)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-4 py-3 text-gray-800 font-medium "
                                                style="background-color: #efefef">{{ $row->tahun }}</td>
                                            <td class="px-4 py-3 text-orange-600 text-center font-semibold">
                                                {{ $row->jumlah_pendaftar }}</td>
                                            <td class="px-4 py-3 text-blue-600 font-semibold text-center">
                                                {{ $row->jumlah_diterima }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </section>
        <!-- Wrapper -->
        <div class="flex flex-col md:flex-row justify-center items-start mt-12 mx-auto ">
            <!-- Daftar Offline -->
            <div class="w-full md:w-1/2 ">
                <section class="relative" id="dafOff">
                    <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/5 to-black/70"></div>
                    <img src="{{ $assetBase . '/assets/bg-p-offline_11zon.webp' }}"
                        class="w-full h-40 object-cover blur-[0.125rem] opacity-80" alt="Daftar Offline" width="100%" height="160">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-black/30 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-4xl font-bold text-white">Daftar Offline</h2>
                    </div>
                </section>
                <img src="{{ $assetBase . '/assets/pendaftaran-offline-nobg.png' }}" alt="Hero SKARIGA"
                    class="w-full h-auto object-cover  md:ml-10">
            </div>

            <!-- Daftar Online -->
            <div class="w-full md:w-1/2">
                <section class="relative" id="dafOn">
                    <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/5 to-black/70"></div>
                    <img src="{{ $assetBase . '/assets/bg-p-online.webp' }}"
                        class="w-full h-40 object-cover blur-[0.125rem] opacity-80" alt="Daftar Online" width="100%" height="160">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-black/30 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-4xl font-bold text-white">Daftar Online</h2>

                    </div>
                </section>
                <div class=" md:mr-5 mt-2">
                    <!-- Bungkus margin kanan di sini -->
                    <img src="{{ $assetBase . '/assets/pend-onl-nobg.png' }}" alt="Hero SKARIGA"
                        class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
        <div class="bg-gray-50">
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="text-center mb-16">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                            Keuntungan Bergabung Dengan Kami
                        </h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Dapatkan berbagai benefit eksklusif ketika Anda mendaftar di SMK PGRI 3 MALANG
                        </p>
                    </div>

                    <!-- Grid untuk 3 card pertama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Card 1 -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-certificate text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Bonus Spesial</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Tablet</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Tas Laptop</span>
                                </li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Rekreasi
                                        Kelulusan</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Outbond</span></li>
                            </ul>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-graduation-cap text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">6 Seragam Sekolah</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Abu Abu Putih</span>
                                </li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Jeans</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Pramuka</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Olahraga</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Wearpack
                                        (Praktik)</span></li>
                            </ul>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-shirt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Seragam Tambahan</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>2 pcs Baju
                                        PKL</span>
                                </li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>2 pcs baju MPLS
                                        (KCS)</span></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Flex container buat 2 card terakhir (biar center) -->
                    <div class="flex justify-center flex-wrap gap-8 mt-8">
                        <!-- Card 4 -->
                        <div
                            class="w-full md:w-[45%] lg:w-[30%] bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-tools text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Kelengkapan Seragam</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Topi</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Hasduk</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Ikat Pinggang</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Card 5 -->
                        <div
                            class="w-full md:w-[45%] lg:w-[30%] bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-ticket text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Sertifikasi Kompetensi</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Paket Pelatihan
                                        Mengemudi Mobil</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Paket Diklat
                                        Pembentukan Karakter</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Pembekalan Pra
                                        Kerja</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>Ujian Sertifikasi
                                        Kompetensi</span></li>
                                <li class="flex items-start"><i
                                        class="fas fa-check text-green-500 mt-1 mr-3"></i><span>SIM A</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
