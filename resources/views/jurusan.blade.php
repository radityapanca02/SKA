<x-layout title="Jurusan - SMK PGRI 3 Malang">

    <div class="bg-[#F8F8F8] text-gray-900 font-sans">
        <div class="container mx-auto px-4 py-6">
            <!-- Hero Section -->
            <section class="relative h-[550px] md:h-[600px] lg:h-[700px] mt-2 rounded-xl overflow-hidden">
                <div class="absolute inset-0 w-full h-full hover-scale">
                    <img src="{{ $assetBase . '/assets/jurusan.png' }}" alt="Hero SKARIGA"
                        class="w-full h-full object-cover " loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                </div>
                <div class="absolute bottom-8 left-3.5 md:left-10 z-10">
                    <h1 class="text-5xl md:text-7xl font-bold text-white drop-shadow-lg hover-scale">
                        TEMUKAN
                    </h1>
                    <h1 class="text-5xl md:text-7xl font-bold text-white drop-shadow-lg hover-scale">
                        POTENSIMU!
                    </h1>
                </div>
            </section>

            <!-- Q&A dan Top 3 Container -->
            <div class="flex flex-col lg:flex-row gap-8 mt-8">
                <!-- Q&A Section (Setengah Lebar) -->
                <section
                    class="flex-1 bg-gray-100 rounded-xl p-4 md:p-6 shadow-2xl flex flex-col items-center justify-center min-h-auto transition-transform duration-300 hover:scale-105">
                    <!-- Header -->
                    <div class="bg-gray-200 rounded-xl shadow-lg px-6 py-4 grid grid-cols-3 items-center w-full">
                        <div class="flex space-x-2">
                            <span class="w-4 h-4 rounded-full bg-red-500 hover:scale-110 transition-transform"></span>
                            <span
                                class="w-4 h-4 rounded-full bg-yellow-500 hover:scale-110 transition-transform"></span>
                            <span class="w-4 h-4 rounded-full bg-green-500 hover:scale-110 transition-transform"></span>
                        </div>
                        <h2 class="text-3xl font-extrabold text-center select-none">Q&A</h2>
                        <div></div>
                    </div>

                    <!-- Chat Bubbles -->
                    <div class="space-y-4 w-full max-w-full mx-auto mt-8">
                        <!-- User 1 -->
                        <x-jurchat whois="USER">
                            Hai kak, aku mau nanya nih...
                        </x-jurchat>

                        <!-- Bot 1 -->
                        <x-jurchat whois="BOT">
                            Halo! Tentu, tanya aja ya. Jangan sungkan-sungkan, hehehe!
                        </x-jurchat>

                        <!-- User 2 -->
                        <x-jurchat whois="USER">
                            Nah, di SKARIGA ini jurusannya ada apa aja ya kak??
                        </x-jurchat>

                        <!-- Bot 2 -->
                        <x-jurchat whois="BOT">
                            Ada banyak jurusan di SKARIGA, yang terbagi menjadi 4 Departemen
                        </x-jurchat>

                        <x-jurchat whois="USER">
                            Wahhh, banyak banget, aku mau tau nih kakk
                        </x-jurchat>

                        <x-jurchat whois="BOT">
                            Pencet aja link dibawah ini
                        </x-jurchat>
                    </div>

                    <!-- Button Navigation -->
                    <div class="mt-10 flex flex-wrap justify-center gap-4">
                        <button data-target="elektro"
                            class="btn-dept elektro-btn bg-orange-500 hover:bg-orange-500 text-white px-6 py-2 rounded-full shadow-md hover:scale-105 transition-transform">
                            ELEKTRO
                        </button>
                        <button data-target="otomotif"
                            class="btn-dept otomotif-btn bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full shadow-md hover:scale-105 transition-transform"
                            style="background-color: rgb(239, 68, 68);">
                            OTOMOTIF
                        </button>
                        <button data-target="pemesinan"
                            class="btn-dept pemesinan-btn bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full shadow-md hover:scale-105 transition-transform"
                            style="background-color: rgba(59, 130, 246, 0.8);">
                            PEMESINAN
                        </button>
                        <button data-target="tik"
                            class="btn-dept tik-btn text-white px-6 py-2 rounded-full shadow-md hover:scale-105 transition-transform"
                            style="background-color: rgb(139, 92, 246);">
                            TIK
                        </button>
                    </div>
                </section>

                <section
                    class="flex-1 bg-gray-100 rounded-xl p-4 md:p-6 shadow-2xl min-h-auto transition-transform duration-300 hover:scale-105">
                    <h2 class="text-lg md:text-xl lg:text-2xl font-bold text-center mb-4 md:mb-6">STATISTIK KUNJUNGAN DEPARTEMEN</h2>

                    <div class="pie-chart-wrapper">
                        <div class="chart-container">
                            <canvas id="jurusanPieChart"></canvas>
                        </div>

                        <div class="hidden chart-legend md:inline-flex" id="chartLegend">
                            <!-- Legend akan diisi oleh JavaScript -->
                        </div>
                    </div>
                </section>
            </div>

            <!-- Departemen Sections (sama seperti sebelumnya) -->
            <!-- ELEKTRO -->
            <section id="elektro" class="mt-16 max-w-full mx-auto">
                <h3 class="text-3xl font-bold mb-6 text-center">ELEKTRO</h3>
                <div class="slider-container overflow-x-auto">
                    <div class="flex space-x-6 pb-4 slider snap-x snap-mandatory">
                        @foreach ($jurusans as $jurusan)
                        @if ($jurusan->departemen == "ELEKTRO")
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ !is_null($jurusan->gambar) ? $assetBase . '/storage/' . $jurusan->gambar : 'https://placehold.co/600x400' }}"
                            departement="{{ $jurusan->departemen }}" loading="lazy">
                            {{ $jurusan->deskripsi }}
                        </x-jurcard>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- OTOMOTIF -->
            <section id="otomotif" class="mt-16 max-w-full mx-auto">
                <h3 class="text-3xl font-bold mb-6 text-center">OTOMOTIF</h3>
                <div class="slider-container overflow-x-auto lg:justify-center">
                    <div class="flex space-x-6 pb-4 slider snap-x snap-mandatory lg:justify-center">
                        @foreach ($jurusans as $jurusan)
                        @if ($jurusan->departemen == "OTOMOTIF")
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ !is_null($jurusan->gambar) ? $assetBase . '/storage/' . $jurusan->gambar : 'https://placehold.co/600x400' }}"
                            departement="{{ $jurusan->departemen }}" loading="lazy">
                            {{ $jurusan->deskripsi }}
                        </x-jurcard>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- PEMESINAN -->
            <section id="pemesinan" class="mt-16 max-w-full mx-auto ">
                <h3 class="text-3xl font-bold mb-6 text-center">PEMESINAN</h3>
                <div class="slider-container overflow-x-auto lg:justify-center">
                    <div class=" flex space-x-6 pb-4 slider snap-x snap-mandatory lg:justify-center">
                        @foreach ($jurusans as $jurusan)
                        @if ($jurusan->departemen == "PEMESINAN")
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ !is_null($jurusan->gambar) ? $assetBase . '/storage/' . $jurusan->gambar : 'https://placehold.co/600x400' }}"
                            departement="{{ $jurusan->departemen }}" loading="lazy">
                            {{ $jurusan->deskripsi }}
                        </x-jurcard>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- TIK -->
            <section id="tik" class="mt-16 max-w-full mx-auto justify-center">
                <h3 class="text-3xl font-bold mb-6 text-center">TEKNOLOGI INFORMASI & KOMUNIKASI</h3>
                <div class="slider-container overflow-x-auto">
                    <div class=" flex space-x-6 pb-4 slider snap-x snap-mandatory">
                        @foreach ($jurusans as $jurusan)
                        @if ($jurusan->departemen == "TIK")
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ !is_null($jurusan->gambar) ? $assetBase . '/storage/' . $jurusan->gambar : 'https://placehold.co/600x400' }}"
                            departement="{{ $jurusan->departemen }}" loading="lazy">
                            {{ $jurusan->deskripsi }}
                        </x-jurcard>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
