<x-layout title="Jurusan - SMK PGRI 3 Malang">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    /* Custom scrollbar untuk slider */
    .slider::-webkit-scrollbar {
        height: 8px;
    }

    .slider::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .slider::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 4px;
    }

    /* Tambahan untuk slider yang lebih baik */
    .slider-container {
        position: relative;
    }

    .slider-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .slider-btn {
        background: #3b82f6;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.3s;
    }

    .slider-btn:hover {
        background: #2563eb;
    }

    .slider-btn:disabled {
        background: #9ca3af;
        cursor: not-allowed;
    }

    /* Efek hover untuk kartu jurusan */
    .jurusan-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .jurusan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Responsif untuk mobile */
    @media (max-width: 768px) {
        .btn-dept {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .qna-top3-container {
            flex-direction: column;
        }

        .top3-section {
            margin-top: 2rem;
        }

        .chart-container {
            height: 250px !important;
        }
    }

    /* Styling untuk Top 3 Section */
    .top3-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin-bottom: 1rem;
        border-left: 4px solid;
    }

    .top3-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .top3-card.first {
        border-left-color: #FFD700;
        background: linear-gradient(to right, #fff8e1, white);
    }

    .top3-card.second {
        border-left-color: #C0C0C0;
        background: linear-gradient(to right, #f5f5f5, white);
    }

    .top3-card.third {
        border-left-color: #CD7F32;
        background: linear-gradient(to right, #f9f0e6, white);
    }

    .rank-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-weight: bold;
        margin-right: 10px;
    }

    .rank-badge.first {
        background-color: #FFD700;
        color: #333;
    }

    .rank-badge.second {
        background-color: #C0C0C0;
        color: #333;
    }

    .rank-badge.third {
        background-color: #CD7F32;
        color: white;
    }

    .click-count {
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .qna-top3-container {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
    }

    .qna-section,
    .top3-section {
        flex: 1;
    }

    .top3-section h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        font-weight: bold;
        color: #1f2937;
    }

    /* Styling untuk diagram lingkaran */
    .chart-container {
        position: relative;
        height: 300px;
        margin: 1rem 0;
    }

    .pie-chart-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .chart-legend {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .no-data-message {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-style: italic;
    }
    </style>

    <div class="bg-white text-gray-900 font-sans">
        <div class="h-full h-max-content container mx-auto px-4 py-6">
            <!-- Hero Section -->
            <section class="relative h-[535px] mt-2 rounded-xl overflow-hidden">
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
            <div class="qna-top3-container">
                <!-- Q&A Section (Setengah Lebar) -->
                <section
                    class="qna-section bg-gray-100 rounded-xl p-6 shadow-2xl flex flex-col items-center justify-center min-h-auto transition-transform duration-300 hover:scale-105">
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

                <!-- Top 3 Jurusan Section (Setengah Lebar) - DIUBAH -->
                <section
                    class="top3-section bg-gray-100 rounded-xl p-6 shadow-2xl min-h-auto transition-transform duration-300 hover:scale-105">
                    <h2>STATISTIK KUNJUNGAN DEPARTEMEN</h2>

                    <div class="pie-chart-wrapper">
                        <div class="chart-container">
                            <canvas id="jurusanPieChart"></canvas>
                        </div>

                        <div class="chart-legend" id="chartLegend">
                            <!-- Legend akan diisi oleh JavaScript -->
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Statistik ini menampilkan persentase kunjungan ke setiap departemen</p>
                        <div class="mt-4 p-3 bg-purple-50 rounded-lg">
                            <p class="text-sm text-purple-700">📊 <strong>Total Kunjungan:</strong> <span
                                    id="total-clicks"></span> kali</p>
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
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ $jurusan->gambar }}"
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
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ $jurusan->gambar }}"
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
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ $jurusan->gambar }}"
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
                        <x-jurcard title="{!! $jurusan->jurusan !!}" image="{{ $jurusan->gambar }}"
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
